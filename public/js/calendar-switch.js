// let counterIdInput = 0
function addTableRow(frontCounter) {
    if (frontCounter >= 4) {
        alert("Превышен лимит периодов");
        return;
    }
    if (counterIdInput == 4) {
        alert("Превышен лимит периодов");
        return;
    }
    counterIdInput++;
    let table = document.querySelector(".wrapper_date_view");

    let newRow = document.createElement("tr");
    newRow.classList.add("wrapper_line");
    newRow.setAttribute("onclick", "selectCurrentRow(this)");

    let newTdLeft = document.createElement("td");
    newTdLeft.classList.add("pt10");

    let newInputLeft = document.createElement("input");
    newInputLeft.classList.add("input_date_admin");
    newInputLeft.setAttribute("type", "data");
    newInputLeft.setAttribute("form", "data");
    newInputLeft.setAttribute("name", "start_active_adv" + counterIdInput);
    newInputLeft.setAttribute("id", "date_start" + counterIdInput);

    newTdLeft.appendChild(newInputLeft);
    newRow.appendChild(newTdLeft);
    // Center column
    let newTdCenter = document.createElement("td");
    newTdCenter.classList.add("pt10");

    let newTire = document.createElement("div");
    newTire.classList.add("tire");

    newTdCenter.appendChild(newTire);
    newRow.appendChild(newTdCenter);
    // Right column
    let newTdRight = document.createElement("td");
    newTdRight.classList.add("pt10");

    let newInputRight = document.createElement("input");
    newInputRight.classList.add("input_date_admin");
    newInputRight.setAttribute("type", "data");
    newInputRight.setAttribute("form", "data");
    newInputRight.setAttribute("name", "end_active_adv" + counterIdInput);
    newInputRight.setAttribute("id", "date_end" + counterIdInput);

    newTdRight.appendChild(newInputRight);
    newRow.appendChild(newTdRight);

    // Right_last
    let newTdRightRight = document.createElement("td");
    newTdRightRight.classList.add("pt10");

    let newBtnRight = document.createElement("button");
    newBtnRight.classList.add("remove_date");
    newBtnRight.setAttribute(
        "onclick",
        "this.parentElement.parentElement.remove()"
    );
    newTdRightRight.appendChild(newBtnRight);
    newRow.appendChild(newTdRightRight);

    table.appendChild(newRow);
    if (document.querySelectorAll(".wrapper_line.active")[0]) {
        document
            .querySelectorAll(".wrapper_line.active")[0]
            .classList.remove("active");
        console.log(calendarStatick.config._disable);
        calendarStatick.config._disable.push({
            from: calendarStatick.selectedDates[0],
            to: calendarStatick.selectedDates[1],
        });
        console.log(calendarStatick.config._disable);

        calendarStatick.selectedDates = [];
        calendarStatick.redraw();
    }
}

function selectCurrentRow(el) {
    let RowArr = document.querySelectorAll(".wrapper_line");
    // if (RowArr.length > 1) {
    //     for (let i = 0; i < RowArr.length; i++) {
    //         RowArr[i].classList.remove("active");
    //     }
    // }

    console.log(el);
    if (el.classList.contains("active")) {
        el.classList.toggle("active");

        let startDate = el.querySelectorAll("input")[0].value;
        let endDate = el.querySelectorAll("input")[1].value;
        calendarStatick.config._disable.push({
            from: flatpickr.parseDate(startDate, "d.m.Y"),
            to: flatpickr.parseDate(endDate, "d.m.Y"),
        });
        calendarStatick.selectedDates = [];
        calendarStatick.redraw();
    } else {
        if (document.querySelectorAll(".wrapper_line.active")[0]) {
            document
                .querySelectorAll(".wrapper_line.active")[0]
                .classList.remove("active");
            el.classList.toggle("active");
            endDateElement =
                el.lastElementChild.previousElementSibling.firstElementChild;
            startDateElement = el.firstElementChild.firstElementChild;
            if (startDateElement.value || endDateElement.value) {
                endDateElementValue = endDateElement.value;
                startDateElementValue = startDateElement.value;
                console.log(calendarStatick.config._disable);
                calendarStatick.config._disable.push({
                    from: calendarStatick.selectedDates[0],
                    to: calendarStatick.selectedDates[1],
                });
                calendarStatick.config._disable =
                    calendarStatick.config._disable.filter((item) =>
                        flatpickr.compareDates(
                            item.from,
                            flatpickr.parseDate(startDateElementValue, "d.m.Y")
                        )
                    );

                calendarStatick.selectedDates = [
                    flatpickr.parseDate(startDateElementValue, "d.m.Y"),
                    flatpickr.parseDate(endDateElementValue, "d.m.Y"),
                ];
                calendarStatick.redraw();
            }
        } else {
            el.classList.toggle("active");
            endDateElement =
                el.lastElementChild.previousElementSibling.firstElementChild;
            startDateElement = el.firstElementChild.firstElementChild;
            if (startDateElement.value || endDateElement.value) {
                endDateElementValue = endDateElement.value;
                startDateElementValue = startDateElement.value;
                calendarStatick.config._disable =
                    calendarStatick.config._disable.filter((item) =>
                        flatpickr.compareDates(
                            item.from,
                            flatpickr.parseDate(startDateElementValue, "d.m.Y")
                        )
                    );

                calendarStatick.selectedDates = [
                    flatpickr.parseDate(startDateElementValue, "d.m.Y"),
                    flatpickr.parseDate(endDateElementValue, "d.m.Y"),
                ];
                calendarStatick.redraw();
            }
        }
    }
}
