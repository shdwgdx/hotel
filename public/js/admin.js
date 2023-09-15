function selectLang(lang) {
    let btn_en = document.querySelector(".select_lang." + lang);
    btn_en.addEventListener("click", () => {
        del_active_lang_class();
        hide_langs_wrapper();
        btn_en.classList.add("active");
        document
            .querySelector(".wrapper_" + lang + "_lang")
            .classList.remove("wrapper_lang_hide");
    });
}
selectLang("en");
selectLang("es");
selectLang("ru");
function del_active_lang_class() {
    let arr_btns_lang = document.querySelectorAll(".select_lang");
    for (let i = 0; i < arr_btns_lang.length; i++) {
        arr_btns_lang[i].classList.remove("active");
    }
}
function hide_langs_wrapper() {
    let wrapper_lang = document.querySelectorAll(".wrapper_lang");
    for (let i = 0; i < wrapper_lang.length; i++) {
        wrapper_lang[i].classList.add("wrapper_lang_hide");
    }
}
function toggleHide() {
    let arrToggleBtn = document.querySelectorAll(".toggle_hide_btn");
    let arrToggleBlock = document.querySelectorAll(".toggle_hide .name_input");
    for (let i = 0; i < arrToggleBlock.length; i++) {
        arrToggleBlock[i].addEventListener("click", () => {
            arrToggleBlock[i].parentElement.classList.toggle("active");
            arrToggleBtn[i].classList.toggle("active");
        });
    }
}
let PhotoFiles = [];

const selectedFile = document.getElementById("img_input");
const photo_wrapper = document.getElementById("photo_wrapper");
let idPhoto = -1;
selectedFile.addEventListener("change", () => {
    if (selectedFile.files[0]) {
        for (let i = 0; i < selectedFile.files.length; i++) {
            idPhoto = idPhoto + 1;
            let newIdPhoto = idPhoto;
            if (selectedFile.files[i].size >= 2000000) {
                alert("Максимальный размер файла 2 Мб");
                return;
            }
            PhotoFiles.push(selectedFile.files[i]);
            var div = document.createElement("div");
            div.classList.add("prev_img_wrapper");
            div.onclick = function () {
                delete PhotoFiles[newIdPhoto];
                this.remove();
            };
            photo_wrapper.prepend(div);

            var hover = document.createElement("div");
            hover.classList.add("prev_img_hover");
            div.prepend(hover);

            var img = document.createElement("img");
            var src = URL.createObjectURL(selectedFile.files[i]);
            img.classList.add("prev_img");
            img.src = src;
            div.appendChild(img);
        }
    }
});
let form = document.getElementById("data");
const uploadImages = () => {
    let formData = new FormData(form);

    for (let key in PhotoFiles) {
        formData.append(key, PhotoFiles[key]);
    }

    fetch("/", {
        method: "POST",
        body: formData,
    })
        .then((response) => response.json())
        .then((result) => {
            if (result.status == true) {
                PhotoFiles = [];
                let last_img = document.querySelectorAll(".prev_img_wrapper");
                for (let i = 0; i < last_img.length; i++) {
                    last_img[i].remove();
                }
                alert("Файлы успешно загружены");
                window.location.replace("/profile/advertisements");
            } else {
                console.log(result);
                alert(`${result.status}`);
            }
        });
};

const editUploadImages = () => {
    let formData = new FormData(form);

    for (let key in PhotoFiles) {
        formData.append(key, PhotoFiles[key]);
    }

    fetch("/edit", {
        method: "POST",
        body: formData,
    })
        .then((response) => response.json())
        .then((result) => {
            if (result.status) {
                PhotoFiles = [];
                alert("Файлы успешно загружены");
                window.location.replace("/admin");
            } else {
                alert("Ошибка");
            }
        });
};
