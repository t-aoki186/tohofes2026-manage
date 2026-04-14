import "./bootstrap";

const ham = document.querySelector("#js-hamburger");
const nav = document.querySelector("#js-nav");

ham.addEventListener("click", function () {
    ham.classList.toggle("active");
    nav.classList.toggle("active");
});

const input = document.getElementById("markdown-input");
const preview = document.getElementById("preview");

input.addEventListener("input", () => {
    // marked.parse で Markdown を HTML に変換
    preview.innerHTML = marked.parse(input.value);
});
