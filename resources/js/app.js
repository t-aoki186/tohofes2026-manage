import "./bootstrap";

const ham = document.querySelector("#js-hamburger");
const nav = document.querySelector("#js-nav");

if (ham && nav) {
    ham.addEventListener("click", function () {
        ham.classList.toggle("active");
        nav.classList.toggle("active");
    });
}

const input = document.getElementById("markdown-input");
const preview = document.getElementById("preview");

if (input && preview && typeof marked !== "undefined") {
    const updatePreview = () => {
        preview.innerHTML = marked.parse(input.value || "");
    };

    updatePreview();
    input.addEventListener("input", updatePreview);
}

// 予定を追加するスクリプト
const container = document.getElementById("schedule-container");
const addButton = document.getElementById("add-schedule");

if (container && addButton) {
    addButton.addEventListener("click", () => {
        const index = container.querySelectorAll(".schedule-row").length;
        const html = `
            <div class="flex gap-2 schedule-row">
                <input type="text" name="schedule[${index}][day]" placeholder="日" class="w-16 bg-[#2c2d30] text-white border border-gray-600 rounded-lg p-2 text-center">
                <input type="text" name="schedule[${index}][time]" placeholder="10:30 ~ 11:30" class="flex-1 bg-[#2c2d30] text-white border border-gray-600 rounded-lg p-2">
                <button type="button" onclick="this.parentElement.remove()" class="text-red-500 px-2">✕</button>
            </div>
        `;
        container.insertAdjacentHTML("beforeend", html);
    });
}
