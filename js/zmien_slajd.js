let slideIndex = 0;

function zmienSlajd(n) {
	let wrapper = document.querySelector(".slajdy_wrapper");
	let slajdy = document.querySelectorAll(".slajd_top_auta");
	slideIndex += n;
	if (slideIndex >= slajdy.length) {
		slideIndex = 0;
	} else if (slideIndex < 0) {
		slideIndex = slajdy.length - 1;
	}
	wrapper.style.transform = "translateX(" + -slideIndex * 100 + "%)";
}
