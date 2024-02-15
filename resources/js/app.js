import "./bootstrap";
import * as bootstrap from "bootstrap";
import "~resources/scss/app.scss";
import.meta.glob(["../img/**"]);

// Libreria animazioni cursore
import { gsap } from "gsap";

const $bigBall = document.querySelector(".cursor__ball--big");
const $smallBall = document.querySelector(".cursor__ball--small");
const $hoverables = document.querySelectorAll(".hoverable");

// Variabili per tenere traccia della posizione del mouse
let mouseX = 0;
let mouseY = 0;

// Listeners
document.body.addEventListener("mousemove", onMouseMove);
for (let i = 0; i < $hoverables.length; i++) {
    $hoverables[i].addEventListener("mouseenter", onMouseHover);
    $hoverables[i].addEventListener("mouseleave", onMouseHoverOut);
}

// Rimuovi il cursore su dispositivi mobili
window.addEventListener("DOMContentLoaded", () => {
    if (
        /Android|webOS|iPhone|iPad|iPod|BlackBerry|Windows Phone/i.test(
            navigator.userAgent
        )
    ) {
        if ($bigBall && $smallBall) {
            $bigBall.remove();
            $smallBall.remove();
        }
    }
});

// Funzione per far seguire la palla piccola a quella grande
function onMouseMove(e) {
    mouseX = e.clientX;
    mouseY = e.clientY;

    updateCursor();
}

// Funzione per aggiornare la posizione del cursore
function updateCursor() {
    // Modifica i valori di bigBall per cambiare la posizione della palla grande
    gsap.to($bigBall, { duration: 0.4, x: mouseX - 10, y: mouseY - 1 });
    gsap.to($smallBall, { duration: 0.1, x: mouseX, y: mouseY });
}

// Funzione di hover sugli elementi
function onMouseHover() {
    gsap.to($bigBall, { duration: 0.3, scale: 4 });
}

function onMouseHoverOut() {
    gsap.to($bigBall, { duration: 0.3, scale: 1 });
}
