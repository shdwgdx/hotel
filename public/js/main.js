let burger_btn = document.querySelector(".burger_btn");
let menu_list = document.querySelector(".menu_list");
let body = document.querySelector("body");

burger_btn.addEventListener("click", () => {
  menu_list.classList.toggle("active");
  burger_btn.classList.toggle("active");
  body.classList.toggle("active");
});

function fixedBlockScroll() {
  let dashbordHotel = document.getElementById("dashbord_hotel");
  let blockForFixed = document.getElementById("block_for_fixed");

  let widthBlock = dashbordHotel.offsetWidth;
  if (document.documentElement.clientWidth > 768) {
    dashbordHotel.style.width = widthBlock + "px";
  }

  let coords = dashbordHotel.getBoundingClientRect();

  let coordsBottom = blockForFixed.getBoundingClientRect();

  window.addEventListener("scroll", function () {
    if (coords.top < pageYOffset) {
      dashbordHotel.classList.add("fixed");
    } else {
      dashbordHotel.classList.remove("fixed");
    }
    if (coordsBottom.top <= pageYOffset) {
      dashbordHotel.classList.remove("fixed");
    }
  });
}

function searchDropdounTypeHouse() {
  let wrapper = document.querySelector(
    ".wpapper_search_input.type_house_wrapper"
  );
  let bodyDropdoun = document.querySelector(
    ".wpapper_search_input.type_house_wrapper .drop_doun_body"
  );
  wrapper.addEventListener("click", () => {
    wrapper.classList.add("active");
  });
  document.addEventListener("click", function (e) {
    if (bodyDropdoun.contains(e.target) || wrapper.contains(e.target)) return;
    wrapper.classList.remove("active");
  });
}

function searchDropdounCity() {
  let wrapper = document.querySelector(
    ".wpapper_search_input.select_city_wrapper"
  );
  let bodyDropdoun = document.querySelector(
    ".wpapper_search_input.select_city_wrapper .drop_doun_body"
  );
  let listPartIsland = document.querySelector(
    ".select_city_wrapper .cityOfferList"
  );
  wrapper.addEventListener("click", (e) => {
    if (listPartIsland.contains(e.target)) return;
    wrapper.classList.add("active");
  });
  document.addEventListener("click", function (e) {
    if (bodyDropdoun.contains(e.target) || wrapper.contains(e.target)) return;
    wrapper.classList.remove("active");
  });
}

function searchDropdounCityApartment() {
  let wrapper = document.querySelector(
    ".wpapper_search_input.select_city_wrapper_apartment"
  );
  let bodyDropdoun = document.querySelector(
    ".wpapper_search_input.select_city_wrapper_apartment .drop_doun_body"
  );
  let listPartIsland = document.querySelector(
    ".select_city_wrapper_apartment .cityOfferList"
  );
  wrapper.addEventListener("click", (e) => {
    if (listPartIsland.contains(e.target)) return;
    wrapper.classList.add("active");
  });
  document.addEventListener("click", function (e) {
    if (bodyDropdoun.contains(e.target) || wrapper.contains(e.target)) return;
    wrapper.classList.remove("active");
  });
}

function searchDropdounDistrict() {
  let wrapper = document.querySelector(
    ".wpapper_search_input.select_district_wrapper"
  );
  let bodyDropdoun = document.querySelector(
    ".wpapper_search_input.select_district_wrapper .drop_doun_body"
  );
  let listPartIsland = document.querySelector(
    ".select_district_wrapper .cityOfferList"
  );
  wrapper.addEventListener("click", (e) => {
    if (listPartIsland.contains(e.target)) return;
    wrapper.classList.add("active");
  });
  document.addEventListener("click", function (e) {
    if (bodyDropdoun.contains(e.target) || wrapper.contains(e.target)) return;
    wrapper.classList.remove("active");
  });
}
function searchDropdounGuests() {
  let wrapper = document.querySelector(
    ".wpapper_search_input.guests_count_wrapper"
  );
  let bodyDropdoun = document.querySelector(
    ".wpapper_search_input.guests_count_wrapper .drop_doun_body"
  );
  wrapper.addEventListener("click", () => {
    wrapper.classList.add("active");
  });
  document.addEventListener("click", function (e) {
    if (bodyDropdoun.contains(e.target) || wrapper.contains(e.target)) return;
    wrapper.classList.remove("active");
  });
}

function counterGuests() {
  let inputView = document.querySelector(".guests_count_wrapper .input_view");

  let counterAdults = document.querySelector(
    ".adults_counter .count_input_geusts"
  );
  let counterChildren = document.querySelector(
    ".children_counter .count_input_geusts"
  );
  let counterBaby = document.querySelector(".baby_counter .count_input_geusts");

  let btnPlusAdults = document.querySelector(".adults_counter .btn_plus");
  let btnMinusAdults = document.querySelector(".adults_counter .btn_minus");

  let btnPlusChildren = document.querySelector(".children_counter .btn_plus");
  let btnMinusChildren = document.querySelector(".children_counter .btn_minus");

  let btnPlusBaby = document.querySelector(".baby_counter .btn_plus");
  let btnMinusBaby = document.querySelector(".baby_counter .btn_minus");

  let max_Adults = 4;
  let max_Children = 2;
  let max_Baby = 2;

  if (counterAdults.value >= max_Adults) {
    btnPlusAdults.setAttribute("disabled", "disabled");
  }
  if (counterChildren.value >= max_Children) {
    btnPlusChildren.setAttribute("disabled", "disabled");
  }
  if (counterAdults.value == 1) {
    btnMinusAdults.setAttribute("disabled", "disabled");
  }
  if (counterAdults.value > 1) {
    btnMinusAdults.removeAttribute("disabled");
  }
  if (counterChildren.value == 0) {
    btnMinusChildren.setAttribute("disabled", "disabled");
  }
  if (counterChildren.value > 0) {
    btnMinusChildren.removeAttribute("disabled");
  }
  if (counterBaby.value >= max_Baby) {
    btnPlusBaby.setAttribute("disabled", "disabled");
  }
  if (counterBaby.value >= 0) {
    btnMinusBaby.removeAttribute("disabled");
  }
  if (counterBaby.value == 0) {
    btnMinusBaby.setAttribute("disabled", "disabled");
  }

  btnPlusAdults.addEventListener("click", () => {
    if (counterAdults.value >= max_Adults - 1) {
      btnPlusAdults.setAttribute("disabled", "disabled");
    }
    if (counterAdults.value >= 1) {
      btnMinusAdults.removeAttribute("disabled");
    }
    counterAdults.value = Number(counterAdults.value) + 1;
    drawAllGuests();
  });
  btnMinusAdults.addEventListener("click", () => {
    if (counterAdults.value == 2) {
      btnMinusAdults.setAttribute("disabled", "disabled");
    }
    if (counterAdults.value <= max_Adults) {
      btnPlusAdults.removeAttribute("disabled");
    }
    counterAdults.value = Number(counterAdults.value) - 1;
    drawAllGuests();
  });

  btnPlusChildren.addEventListener("click", () => {
    if (counterChildren.value >= max_Children - 1) {
      btnPlusChildren.setAttribute("disabled", "disabled");
    }
    if (counterChildren.value >= 0) {
      btnMinusChildren.removeAttribute("disabled");
    }
    counterChildren.value = Number(counterChildren.value) + 1;
    drawAllGuests();
  });
  btnMinusChildren.addEventListener("click", () => {
    if (counterChildren.value == 1) {
      btnMinusChildren.setAttribute("disabled", "disabled");
    }
    if (counterChildren.value <= max_Children) {
      btnPlusChildren.removeAttribute("disabled");
    }
    counterChildren.value = Number(counterChildren.value) - 1;
    drawAllGuests();
  });

  btnPlusBaby.addEventListener("click", () => {
    if (counterBaby.value >= max_Baby - 1) {
      btnPlusBaby.setAttribute("disabled", "disabled");
    }
    if (counterBaby.value >= 0) {
      btnMinusBaby.removeAttribute("disabled");
    }
    counterBaby.value = Number(counterBaby.value) + 1;
    drawAllGuests();
  });
  btnMinusBaby.addEventListener("click", () => {
    if (counterBaby.value == 1) {
      btnMinusBaby.setAttribute("disabled", "disabled");
    }
    if (counterBaby.value <= max_Baby) {
      btnPlusBaby.removeAttribute("disabled");
    }
    counterBaby.value = Number(counterBaby.value) - 1;
    drawAllGuests();
  });
  function drawAllGuests() {
    let countAllGuests =
      Number(counterAdults.value) +
      Number(counterChildren.value) +
      Number(counterBaby.value);
    if (typeof filterState !== "undefined") {
      filterState.guestsAdults = counterAdults.value;
      filterState.guestsChildren = counterChildren.value;
      filterState.guestsBaby = counterBaby.value;
    }
    if (countAllGuests > 1) {
      inputView.innerHTML = countAllGuests + " гостей";
    } else {
      inputView.innerHTML = countAllGuests + " гостя";
    }
  }
}

function searchDropdounSort() {
  let wrapper = document.querySelector(".sort_wrapper");
  let bodyDropdoun = document.querySelector(".sort_wrapper .drop_doun_body");
  wrapper.addEventListener("click", () => {
    wrapper.classList.add("active");
  });
  document.addEventListener("click", function (e) {
    if (bodyDropdoun.contains(e.target) || wrapper.contains(e.target)) return;
    wrapper.classList.remove("active");
  });
}

function drawTypeHouse() {
  let typesCollection = document.querySelectorAll(
    ".type_house_wrapper .item_checkbox input"
  );

  if (typesCollection.length > 0) {
    for (let i = 0; i < typesCollection.length; i++) {
      typesCollection[i].addEventListener("change", listenerChangeTypeHouse);
    }
  }
  function listenerChangeTypeHouse() {
    let inputView = document.querySelector(".type_house_wrapper .input_view");

    let flatChackbox = document.getElementById("flat");
    let villaChackbox = document.getElementById("villa");
    let penthouseChackbox = document.getElementById("penthouse");
    let townhouseChackbox = document.getElementById("townhouse");

    let flatLabel = flatChackbox.nextElementSibling.innerHTML;
    let villaLabel = villaChackbox.nextElementSibling.innerHTML;
    let penthouseLabel = penthouseChackbox.nextElementSibling.innerHTML;
    let townhouseLabel = townhouseChackbox.nextElementSibling.innerHTML;

    inputView.value = "";

    filterState.flat = "";
    filterState.villa = "";
    filterState.penthouse = "";
    filterState.townhouse = "";

    if (flatChackbox.checked) {
      inputView.value += flatLabel + "; ";
      if (typeof filterState !== "undefined") {
        filterState.flat = "flat";
      }
    }
    if (villaChackbox.checked) {
      inputView.value += villaLabel + "; ";
      if (typeof filterState !== "undefined") {
        filterState.villa = "villa";
      }
    }
    if (penthouseChackbox.checked) {
      inputView.value += penthouseLabel + "; ";
      if (typeof filterState !== "undefined") {
        filterState.penthouse = "penthouse";
      }
    }
    if (townhouseChackbox.checked) {
      inputView.value += townhouseLabel + "; ";
      if (typeof filterState !== "undefined") {
        filterState.townhouse = "townhouse";
      }
    }
  }
}

function openFilter() {
  let btnOpenFilter = document.getElementById("btn_open_filter");
  let filterWrapper = document.querySelector(".filter_wrapper");

  btnOpenFilter.addEventListener("click", () => {
    filterWrapper.classList.add("active");
  });
}
function closeFilter() {
  let btnCloseFilter = document.getElementById("btn_close_filter");
  let filterWrapper = document.querySelector(".filter_wrapper");

  btnCloseFilter.addEventListener("click", () => {
    filterWrapper.classList.remove("active");
  });
}

function counterGuestsFilter() {
  let counterAdults = document.querySelector(
    ".guests_count_wrapper_filter .adults_counter .count_input_geusts"
  );
  let counterChildren = document.querySelector(
    ".guests_count_wrapper_filter .children_counter .count_input_geusts"
  );
  let counterBaby = document.querySelector(
    ".guests_count_wrapper_filter .baby_counter .count_input_geusts"
  );

  let btnPlusAdults = document.querySelector(
    ".guests_count_wrapper_filter .adults_counter .btn_plus"
  );
  let btnMinusAdults = document.querySelector(
    ".guests_count_wrapper_filter .adults_counter .btn_minus"
  );

  let btnPlusChildren = document.querySelector(
    ".guests_count_wrapper_filter .children_counter .btn_plus"
  );
  let btnMinusChildren = document.querySelector(
    ".guests_count_wrapper_filter .children_counter .btn_minus"
  );

  let btnPlusBaby = document.querySelector(
    ".guests_count_wrapper_filter .baby_counter .btn_plus"
  );
  let btnMinusBaby = document.querySelector(
    ".guests_count_wrapper_filter .baby_counter .btn_minus"
  );

  let max_Adults = 4;
  let max_Children = 2;
  let max_Baby = 2;

  if (counterAdults.value >= max_Adults) {
    btnPlusAdults.setAttribute("disabled", "disabled");
  }
  if (counterChildren.value >= max_Children) {
    btnPlusChildren.setAttribute("disabled", "disabled");
  }
  if (counterAdults.value == 1) {
    btnMinusAdults.setAttribute("disabled", "disabled");
  }
  if (counterAdults.value > 1) {
    btnMinusAdults.removeAttribute("disabled");
  }
  if (counterChildren.value == 0) {
    btnMinusChildren.setAttribute("disabled", "disabled");
  }
  if (counterChildren.value > 0) {
    btnMinusChildren.removeAttribute("disabled");
  }
  if (counterBaby.value >= max_Baby) {
    btnPlusBaby.setAttribute("disabled", "disabled");
  }
  if (counterBaby.value >= 0) {
    btnMinusBaby.removeAttribute("disabled");
  }
  if (counterBaby.value == 0) {
    btnMinusBaby.setAttribute("disabled", "disabled");
  }

  btnPlusAdults.addEventListener("click", () => {
    if (counterAdults.value >= max_Adults - 1) {
      btnPlusAdults.setAttribute("disabled", "disabled");
    }
    if (counterAdults.value >= 1) {
      btnMinusAdults.removeAttribute("disabled");
    }
    counterAdults.value = Number(counterAdults.value) + 1;
    setStateGuests();
  });
  btnMinusAdults.addEventListener("click", () => {
    if (counterAdults.value == 2) {
      btnMinusAdults.setAttribute("disabled", "disabled");
    }
    if (counterAdults.value <= max_Adults) {
      btnPlusAdults.removeAttribute("disabled");
    }
    counterAdults.value = Number(counterAdults.value) - 1;
    setStateGuests();
  });

  btnPlusChildren.addEventListener("click", () => {
    if (counterChildren.value >= max_Children - 1) {
      btnPlusChildren.setAttribute("disabled", "disabled");
    }
    if (counterChildren.value >= 0) {
      btnMinusChildren.removeAttribute("disabled");
    }
    counterChildren.value = Number(counterChildren.value) + 1;
    setStateGuests();
  });
  btnMinusChildren.addEventListener("click", () => {
    if (counterChildren.value == 1) {
      btnMinusChildren.setAttribute("disabled", "disabled");
    }
    if (counterChildren.value <= max_Children) {
      btnPlusChildren.removeAttribute("disabled");
    }
    counterChildren.value = Number(counterChildren.value) - 1;
    setStateGuests();
  });

  btnPlusBaby.addEventListener("click", () => {
    if (counterBaby.value >= max_Baby - 1) {
      btnPlusBaby.setAttribute("disabled", "disabled");
    }
    if (counterBaby.value >= 0) {
      btnMinusBaby.removeAttribute("disabled");
    }
    counterBaby.value = Number(counterBaby.value) + 1;
    setStateGuests();
  });
  btnMinusBaby.addEventListener("click", () => {
    if (counterBaby.value == 1) {
      btnMinusBaby.setAttribute("disabled", "disabled");
    }
    if (counterBaby.value <= max_Baby) {
      btnPlusBaby.removeAttribute("disabled");
    }
    counterBaby.value = Number(counterBaby.value) - 1;
    setStateGuests();
  });

  function setStateGuests() {
    let countAllGuests =
      Number(counterAdults.value) +
      Number(counterChildren.value) +
      Number(counterBaby.value);
    if (typeof filterState !== "undefined") {
      filterState.guestsAdults = counterAdults.value;
      filterState.guestsChildren = counterChildren.value;
      filterState.guestsBaby = counterBaby.value;
    }
  }
}

function viewAll(element) {
  let bodyBlock = element.parentNode;
  bodyBlock.classList.toggle("active");
  element.classList.toggle("active");
  console.log(bodyBlock);
}

// function counterRooms() {
//   let inputView = document.querySelector(".rooms_count_wrapper .input_view");

//   let counterRooms = document.querySelector(
//     ".rooms_counter .count_input_geusts"
//   );

//   let btnPlusRooms = document.querySelector(".rooms_counter .btn_plus");
//   let btnMinusRooms = document.querySelector(".rooms_counter .btn_minus");

//   let max_Rooms = 5;

//   if (counterRooms.value >= max_Rooms) {
//     btnPlusAdults.setAttribute("disabled", "disabled");
//   }
//   if (counterRooms.value == 0) {
//     btnMinusAdults.setAttribute("disabled", "disabled");
//   }
//   if (counterRooms.value > 0) {
//     btnMinusAdults.removeAttribute("disabled");
//   }

//   btnPlusRooms.addEventListener("click", () => {
//     if (counterRooms.value >= max_Rooms - 1) {
//       btnPlusRooms.setAttribute("disabled", "disabled");
//     }
//     if (counterRooms.value >= 1) {
//       btnMinusRooms.removeAttribute("disabled");
//     }
//     counterRooms.value = Number(counterRooms.value) + 1;
//     drawAllRooms();
//   });
//   btnMinusRooms.addEventListener("click", () => {
//     if (counterRooms.value == 1) {
//       btnMinusRooms.setAttribute("disabled", "disabled");
//     }
//     if (counterRooms.value <= max_Rooms) {
//       btnPlusAdults.removeAttribute("disabled");
//     }
//     counterRooms.value = Number(counterRooms.value) - 1;
//     drawAllRooms();
//   });
// }

// function drawAllRooms() {
//   let countAllRooms = Number(counterRooms.value);
//   if (typeof filterState !== "undefined") {
//     filterState.Rooms = counterRooms.value;
//   }
//   if (countAllRooms > 1) {
//     inputView.innerHTML = countAllRooms + " гостей";
//   } else {
//     inputView.innerHTML = countAllRooms + " гостя";
//   }
// }

// function counterRoomsFilter() {
//   let counterRooms = document.querySelector(
//     ".rooms_count_wrapper_filter .rooms_counter .count_input_geusts"
//   );

//   let btnPlusRooms = document.querySelector(
//     ".rooms_count_wrapper_filter .rooms_counter .btn_plus"
//   );
//   let btnMinusRooms = document.querySelector(
//     ".rooms_count_wrapper_filter .rooms_counter .btn_minus"
//   );

//   let max_Rooms = 5;

//   if (counterRooms.value >= max_Rooms) {
//     btnPlusRooms.setAttribute("disabled", "disabled");
//   }

//   if (counterRooms.value == 0) {
//     btnMinusRooms.setAttribute("disabled", "disabled");
//   }
//   if (counterRooms.value > 0) {
//     btnMinusRooms.removeAttribute("disabled");
//   }

//   btnPlusRooms.addEventListener("click", () => {
//     if (counterRooms.value >= max_Rooms - 1) {
//       btnPlusRooms.setAttribute("disabled", "disabled");
//     }
//     if (counterRooms.value >= 1) {
//       btnMinusRooms.removeAttribute("disabled");
//     }
//     counterRooms.value = Number(counterRooms.value) + 1;
//     setStateGuests();
//   });
//   btnMinusRooms.addEventListener("click", () => {
//     if (counterRooms.value == 2) {
//       btnMinusRooms.setAttribute("disabled", "disabled");
//     }
//     if (counterRooms.value <= max_Rooms) {
//       btnPlusRooms.removeAttribute("disabled");
//     }
//     counterRooms.value = Number(counterRooms.value) - 1;
//     setStateGuests();
//   });

//   function setStateGuests() {
//     let countAllGuests = Number(counterRooms.value);
//     if (typeof filterState !== "undefined") {
//       filterState.Rooms = counterRooms.value;
//     }
//   }
// }

// function searchDropdounRooms() {
//   let wrapper = document.querySelector(
//     ".wpapper_search_input.rooms_count_wrapper"
//   );
//   let bodyDropdoun = document.querySelector(
//     ".wpapper_search_input.rooms_count_wrapper .drop_doun_body"
//   );
//   wrapper.addEventListener("click", () => {
//     wrapper.classList.add("active");
//   });
//   document.addEventListener("click", function (e) {
//     if (bodyDropdoun.contains(e.target) || wrapper.contains(e.target)) return;
//     wrapper.classList.remove("active");
//   });
// }
