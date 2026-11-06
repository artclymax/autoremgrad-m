//import "jarallax/dist/jarallax.min.css";
import "@fancyapps/ui/dist/fancybox/fancybox.css";
//import "aos/dist/aos.css";
import "./scss/style.scss";
//!
import { Swiper } from "swiper/bundle";

//import { jarallax } from "jarallax";
import { Fancybox } from "@fancyapps/ui/dist/fancybox/";
//import AOS from "AOS";

import { AutoCalc } from "./js/AutoCalc.js";
import { Menu } from "./js/Menu.js";
//import { RunningLine } from './js/RunningLine.js';
//import { BackdropList } from './js/BackdropList.js';
import { Modal } from "./js/Modal.js";
//import { cookies } from "./js/Cookies.js";
//import { AnimationCounter } from "./js/AnimationCounter.js";
//import HiddenDescr from "./js/HiddenDescr.js";
//import HiddenList from "./js/HiddenList.js";
import { imask } from "./js/imask.js";
import { fileBtn } from "./js/FileBtn.js";
//import { CustomFieldSelect } from "./js/CustomFieldSelect.js";
import { Spoiler } from "./js/Spoiler.js";
import { ScrollToTop } from "./js/ScrollToTop.js";
import { MXSwiper } from "./js/MXSwiper.js";
import { CustomSelect } from "./js/CustomSelect.js";
import { Tabs } from "./js/Tabs.js";
//import { MapScrollLock } from './js/MapScrollLock.js';
//import { cf7CustomValidation } from './js/cf7-validation.js';
//import { SelectFromAcf } from './js/SelectFromAcf.js';
//import { loadMore } from './js/loadMore.js';
//import AirDatepicker from 'air-datepicker';
//import 'air-datepicker/air-datepicker.css';
//document.querySelectorAll('input.form-input-date')?.forEach(input => {
//	new AirDatepicker(input, {
//		selectedDates: [new Date()],
//		isMobile: true,
//		autoClose: true,
//		minDate: new Date(),
//	});
//})
// time
//document.querySelectorAll('input.form-input-time')?.forEach(input => {
//	new AirDatepicker(input, {
//		isMobile: true,
//		autoClose: true,
//		timepicker: true,
//		onlyTimepicker: true
//	});
//})
//cf7CustomValidation();

// FOR CONTACTS FORM 7
//import "./js/redirect-to-thanks-page.js";

new AutoCalc();
//new CustomFieldSelect({
//	input: '.form-wrapper .cf-select',
//	lastEdit: false
//});
new Menu({
	btn: ".burger-btn", //.burger-btn-icon
	menu: ".header-menu",
	activeClass: "open-header-menu",
	closeBtns: ["a", ".cart-btn"],
});
//new Menu({
//	btn: '.filter-mobile-btn',
//	menu: '.filter',
//	activeClass: 'open-filter-menu',
//	closeBtns: ['.filter-close-btn']
//})
//new Menu({
//	btn: '.header__phone-btn', //.burger-btn-icon
//	menu: '.header-phone-box',
//	activeClass: 'open-phone-box',
//	//closeBtns: ['.menu-close-btn']
//})

//new BackdropList();

new Modal();

//jarallax(document.querySelectorAll(".jarallax"), {
//	speed: 0.2,
//});

//cookies();
imask();

Fancybox.bind("[data-fancybox]", {
	placeFocusBack: false,
});

//new RunningLine();
new ScrollToTop();

new Spoiler();

//new Spoiler('[data-spoiler]', {
//	onlyOneOpen: true,
//	activeClass: 'is-open',
//});

//new Spoiler('[data-spoiler]', { media: 'max-width: 768px' });

new MXSwiper();

new CustomSelect({
	selector: "select",
	forceSend: true,
});

//new MapScrollLock();
/*
window.addEventListener('scroll', function () {
	const header = document.querySelector('.header');

	if (window.scrollY > 50) {
		header.classList.add('scrolled');
	} else {
		header.classList.remove('scrolled');
		const valueUnits = header.offsetHeight;
		document.querySelector(':root').style.setProperty(`--header-height`, valueUnits + 'px');
	}
});
*/

fileBtn(); //

//new Tabs();

//document.querySelectorAll('video.wp-video-shortcode').forEach(video => {
//	if (!video.src) {
//		const link = video.querySelector('a');
//		if (link) video.src = link.href;
//	}
//});

//document?.querySelectorAll('.wpcf7-acceptance input[type="checkbox"]')?.forEach(el => {
//	el.checked = true;
//})

//AOS.init({
//	disable: 'mobile',
//	duration: 600,
//	offset: 100
//});

//new SelectFromAcf('.custom-select-product', {
//	data: '.select-products-data'
//})

//loadMore();

//AnimationCounter();

//HiddenDescr();

//HiddenList();

document.addEventListener("DOMContentLoaded", () => {
	const mainSwiperEl = document.querySelector('[data-product-swiper="main"]');
	const thumbsSwiperEl = document.querySelector(
		'[data-product-swiper="thumbs"]',
	);

	if (!mainSwiperEl || !thumbsSwiperEl) return;

	// Ждём загрузки Swiper (если подключается через defer/async)
	const initSliders = () => {
		if (typeof Swiper === "undefined") {
			setTimeout(initSliders, 100);
			return;
		}

		const thumbsSwiper = new Swiper(thumbsSwiperEl, {
			slidesPerView: 3,
			spaceBetween: 10,
			freeMode: true,
			watchSlidesProgress: true,
			breakpoints: {
				768: { spaceBetween: 20 },
			},
		});

		new Swiper(mainSwiperEl, {
			slidesPerView: 1,
			spaceBetween: 20,
			rewind: true,
			thumbs: {
				swiper: thumbsSwiper,
			},
		});
	};

	initSliders();
});

document.addEventListener("DOMContentLoaded", () => {
	const swiperEl = document.querySelector(".home-reviews-swiper");
	if (!swiperEl) return;

	const prevBtn = swiperEl.querySelector(".home-reviews-swiper__prev");
	const nextBtn = swiperEl.querySelector(".home-reviews-swiper__next");
	const counterCurrent = swiperEl.querySelector(
		".home-reviews-swiper__counter-current",
	);
	const counterTotal = swiperEl.querySelector(
		".home-reviews-swiper__counter-total",
	);

	const swiper = new Swiper(swiperEl, {
		slidesPerView: 1,
		spaceBetween: 20,
		rewind: true,
		navigation: {
			prevEl: prevBtn,
			nextEl: nextBtn,
		},
	});

	// Обновление счётчика
	const updateCounter = () => {
		const current = String(swiper.realIndex + 1).padStart(2, "0");
		const total = String(swiper.slides.length).padStart(2, "0");

		if (counterCurrent) counterCurrent.textContent = current;
		if (counterTotal) counterTotal.textContent = total;
	};

	updateCounter();
	swiper.on("slideChange", updateCounter);
});

document.addEventListener("DOMContentLoaded", () => {
	const hash = window.location.hash;
	const hashId = hash ? hash.replace("#", "") : "";

	// Уровень 2: Услуги (инициализируем первым)
	new Tabs({
		tab: "[data-svc-tab]",
		link: "[data-svc-link]",
		activeClass: "active-svc",
	});

	// Уровень 1: Категории
	new Tabs({
		tab: "[data-cat-tab]",
		link: "[data-cat-link]",
		activeClass: "active-cat",
		onActivate: (link, tab) => {
			// Находим первый таб услуг внутри активной категории
			const firstSvcLink = tab.querySelector("[data-svc-link]");

			// Если хэш указывает на таб внутри этой категории — активируем его
			if (hashId && hashId.startsWith(tab.id + "-")) {
				const targetSvcLink = tab.querySelector(
					`[data-svc-link][href="#${hashId}"]`,
				);
				if (targetSvcLink && !targetSvcLink.classList.contains("active-svc")) {
					targetSvcLink.click();
				}
				return;
			}

			// Иначе активируем первый таб услуг (если он ещё не активен)
			if (firstSvcLink && !firstSvcLink.classList.contains("active-svc")) {
				firstSvcLink.click();
			}
		},
	});
});

document.addEventListener("DOMContentLoaded", () => {
	// 1. ПРОВЕРКА: если переменная из PHP не загрузилась, выходим, чтобы не было ошибок
	if (typeof projectsAjax === "undefined") return;

	const loadMoreBtn = document.querySelector("[data-projects-load-more]");
	const projectsGrid = document.querySelector("#projects-grid");

	if (!loadMoreBtn || !projectsGrid) return;

	loadMoreBtn.addEventListener("click", async () => {
		const currentPage = parseInt(loadMoreBtn.dataset.currentPage);
		const totalPages = parseInt(loadMoreBtn.dataset.totalPages);
		const currentCat = loadMoreBtn.dataset.currentCat;
		const postsPerPage = parseInt(projectsGrid.dataset.projectsPerPage);

		if (currentPage >= totalPages) return;

		const nextPage = currentPage + 1;

		// Состояние загрузки
		loadMoreBtn.disabled = true;
		loadMoreBtn.textContent = "Загрузка...";

		try {
			// 2. ИСПОЛЬЗУЕМ projectsAjax.url (он теперь содержит правильный путь)
			const response = await fetch(projectsAjax.url, {
				method: "POST",
				headers: {
					"Content-Type": "application/x-www-form-urlencoded",
				},
				body: new URLSearchParams({
					action: "load_more_projects",
					page: nextPage,
					per_page: postsPerPage,
					cat: currentCat,
					nonce: projectsAjax.nonce, // Передаем nonce для безопасности
				}),
			});

			// 3. Проверка, что сервер вернул именно JSON, а не HTML-ошибку
			const contentType = response.headers.get("content-type");
			if (contentType && contentType.indexOf("application/json") !== -1) {
				const data = await response.json();

				if (data.success && data.data && data.data.html) {
					const tempDiv = document.createElement("div");
					tempDiv.innerHTML = data.data.html; // ИСПРАВЛЕНИЕ: data.data.html
					const newCards = tempDiv.querySelectorAll(
						".projects-page__card, .projects-page__gallery-link",
					);

					newCards.forEach((card) => {
						projectsGrid.appendChild(card);
					});

					loadMoreBtn.dataset.currentPage = nextPage;

					if (nextPage >= totalPages) {
						loadMoreBtn.closest(".projects-page__load-more").style.display =
							"none";
					} else {
						loadMoreBtn.disabled = false;
						loadMoreBtn.textContent = "Показать ещё работы";
					}

					// Переинициализация Fancybox для новых элементов
					if (typeof Fancybox !== "undefined") {
						Fancybox.bind("[data-fancybox]", {});
					}
				} else {
					console.error(
						"Сервер вернул не JSON. Проверьте вкладку Network в DevTools.",
					);
					loadMoreBtn.disabled = false;
					loadMoreBtn.textContent = "Показать ещё работы";
				}
			} else {
				console.error(
					"Сервер вернул не JSON. Проверьте вкладку Network в DevTools.",
				);
				loadMoreBtn.disabled = false;
				loadMoreBtn.textContent = "Показать ещё работы";
			}
		} catch (error) {
			console.error("Ошибка сети:", error);
			loadMoreBtn.disabled = false;
			loadMoreBtn.textContent = "Показать ещё работы";
		}
	});
});
// Load More для отзывов
document.addEventListener("DOMContentLoaded", () => {
	// Проверка: если переменная из PHP не загрузилась, выходим
	if (typeof reviewsAjax === "undefined") return;

	const loadMoreBtn = document.querySelector("[data-reviews-load-more]");
	const reviewsGrid = document.querySelector("#reviews-grid");

	if (!loadMoreBtn || !reviewsGrid) return;

	loadMoreBtn.addEventListener("click", async () => {
		const currentPage = parseInt(loadMoreBtn.dataset.currentPage);
		const totalPages = parseInt(loadMoreBtn.dataset.totalPages);
		const postsPerPage = parseInt(reviewsGrid.dataset.reviewsPerPage);

		if (currentPage >= totalPages) return;

		const nextPage = currentPage + 1;

		// Состояние загрузки
		loadMoreBtn.disabled = true;
		loadMoreBtn.textContent = "Загрузка...";

		try {
			const response = await fetch(reviewsAjax.url, {
				method: "POST",
				headers: {
					"Content-Type": "application/x-www-form-urlencoded",
				},
				body: new URLSearchParams({
					action: "load_more_reviews",
					page: nextPage,
					per_page: postsPerPage,
					nonce: reviewsAjax.nonce,
				}),
			});

			// Проверяем, что сервер вернул именно JSON
			const contentType = response.headers.get("content-type");
			if (contentType && contentType.indexOf("application/json") !== -1) {
				const data = await response.json();

				if (data.success && data.data && data.data.html) {
					const tempDiv = document.createElement("div");
					tempDiv.innerHTML = data.data.html;
					const newCards = tempDiv.querySelectorAll(".reviews-page__card");

					newCards.forEach((card) => {
						reviewsGrid.appendChild(card);
					});

					loadMoreBtn.dataset.currentPage = nextPage;

					if (nextPage >= totalPages) {
						loadMoreBtn.closest(".reviews-page__load-more").style.display =
							"none";
					} else {
						loadMoreBtn.disabled = false;
						loadMoreBtn.textContent = "Показать ещё отзывы";
					}
				} else {
					console.error("Ошибка AJAX:", data);
					loadMoreBtn.disabled = false;
					loadMoreBtn.textContent = "Показать ещё отзывы";
				}
			} else {
				console.error(
					"Сервер вернул не JSON. Проверьте вкладку Network в DevTools.",
				);
				loadMoreBtn.disabled = false;
				loadMoreBtn.textContent = "Показать ещё отзывы";
			}
		} catch (error) {
			console.error("Ошибка сети:", error);
			loadMoreBtn.disabled = false;
			loadMoreBtn.textContent = "Показать ещё отзывы";
		}
	});
});
document.addEventListener("DOMContentLoaded", () => {
	const sections = document.querySelectorAll(".policy-section");
	const navLinks = document.querySelectorAll(".policy-nav__link");
	const mobileSelect = document.getElementById("policy-mobile-select");

	if (!sections.length) return;

	// Смещение от верха (высота sticky header сайта)
	const HEADER_OFFSET = 120;

	// ===== 1. Плавный скролл по клику на ссылку навигации =====
	navLinks.forEach((link) => {
		link.addEventListener("click", (e) => {
			e.preventDefault();
			const targetId = link.getAttribute("data-target");
			const targetSection = document.getElementById(targetId);

			if (targetSection) {
				scrollToSection(targetSection);
				history.pushState(null, null, `#${targetId}`);
			}
		});
	});

	// ===== 2. Мобильный селект =====
	if (mobileSelect) {
		mobileSelect.addEventListener("change", (e) => {
			const targetId = e.target.value.replace("#", "");
			const targetSection = document.getElementById(targetId);

			if (targetSection) {
				scrollToSection(targetSection);
				history.pushState(null, null, `#${targetId}`);
			}
		});
	}

	// ===== 3. Подсветка активного раздела при скролле (IntersectionObserver) =====
	const observerOptions = {
		root: null,
		rootMargin: `-${HEADER_OFFSET}px 0px -60% 0px`, // Активный раздел — в верхней трети экрана
		threshold: 0,
	};

	const observer = new IntersectionObserver((entries) => {
		entries.forEach((entry) => {
			if (entry.isIntersecting) {
				const activeId = entry.target.getAttribute("data-section-id");

				// Обновляем активный класс в навигации
				navLinks.forEach((link) => {
					link.classList.toggle(
						"active",
						link.getAttribute("data-target") === activeId,
					);
				});

				// Обновляем значение селекта на мобильных
				if (mobileSelect) {
					mobileSelect.value = `#${activeId}`;
				}
			}
		});
	}, observerOptions);

	sections.forEach((section) => observer.observe(section));

	// ===== 4. Прокрутка к разделу при загрузке страницы (если в URL есть hash) =====
	if (window.location.hash) {
		const targetId = window.location.hash.replace("#", "");
		const targetSection = document.getElementById(targetId);

		if (targetSection) {
			// Небольшая задержка, чтобы страница успела отрендериться
			setTimeout(() => scrollToSection(targetSection), 100);
		}
	}

	// ===== 5. Кнопка "Вернуться наверх" =====
	const backToTop = document.querySelector(".policy-page__back-to-top");
	if (backToTop) {
		backToTop.addEventListener("click", (e) => {
			e.preventDefault();
			window.scrollTo({ top: 0, behavior: "smooth" });
			history.pushState(null, null, " ");
		});
	}

	// ===== Вспомогательная функция плавного скролла =====
	function scrollToSection(target) {
		const offsetTop =
			target.getBoundingClientRect().top + window.pageYOffset - HEADER_OFFSET;
		window.scrollTo({ top: offsetTop, behavior: "smooth" });
	}
});
