(() => {
    const header = document.getElementById("site-header");
    const nav = document.getElementById("main-nav");
    const overlays = {
        search: document.getElementById("search-overlay"),
        country: document.getElementById("country-overlay"),
        lang: document.getElementById("lang-overlay"),
    };

    const open = (name) => {
        if (name === "menu") {
            const willOpen = !nav?.classList.contains("is-open");
            nav?.classList.toggle("is-open", willOpen);
            header?.classList.toggle("is-menu-open", willOpen);
            header
                ?.querySelector(".menu-toggle")
                ?.setAttribute("aria-expanded", willOpen ? "true" : "false");
            if (!willOpen) closeNavMenus();
            return;
        }
        Object.entries(overlays).forEach(([key, el]) => {
            if (key === name) el?.removeAttribute("hidden");
            else el?.setAttribute("hidden", "");
        });
        if (name === "search") {
            window.setTimeout(
                () => document.getElementById("overlay-q")?.focus(),
                40,
            );
        }
        document.body.style.overflow = "hidden";
    };

    const close = (name) => {
        if (name && overlays[name]) overlays[name].setAttribute("hidden", "");
        else
            Object.values(overlays).forEach((el) =>
                el?.setAttribute("hidden", ""),
            );
        document.body.style.overflow = "";
    };

    document.querySelectorAll("[data-open]").forEach((btn) => {
        btn.addEventListener("click", () => open(btn.dataset.open));
    });
    document.querySelectorAll("[data-close]").forEach((btn) => {
        btn.addEventListener("click", () => close(btn.dataset.close));
    });
    Object.entries(overlays).forEach(([name, el]) => {
        el?.addEventListener("click", (event) => {
            if (event.target === el) close(name);
        });
    });
    document.addEventListener("keydown", (event) => {
        if (event.key === "Escape") {
            close();
            closeMobileNav();
        }
    });

    const setLanguage = (lang) => {
        const domain = window.location.hostname;
        const clearCookie = () => {
            const past = "expires=Thu, 01 Jan 1970 00:00:00 GMT";
            ["", domain, `.${domain}`].forEach((host) => {
                const part = host ? `; domain=${host}` : "";
                document.cookie = `googtrans=; path=/${part}; ${past}`;
                document.cookie = `googtrans=/en/en; path=/${part}; ${past}`;
            });
        };

        document.querySelectorAll(".lang-option").forEach((btn) => {
            btn.classList.toggle("is-active", btn.dataset.lang === lang);
        });
        document.documentElement.lang = lang;
        document.documentElement.classList.toggle(
            "translated-rtl",
            ["ar", "ur", "fa"].includes(lang),
        );

        if (lang === "en") {
            clearCookie();
            window.location.href =
                window.location.pathname + window.location.search;
            return;
        }

        const expire = "expires=Thu, 01 Jan 2099 00:00:00 GMT";
        document.cookie = `googtrans=/en/${lang}; path=/; ${expire}`;
        document.cookie = `googtrans=/en/${lang}; path=/; domain=${domain}; ${expire}`;
        window.location.reload();
    };

    document.querySelectorAll(".lang-option").forEach((btn) => {
        btn.addEventListener("click", () => setLanguage(btn.dataset.lang));
    });

    const match = document.cookie.match(/(?:^|;\s*)googtrans=\/en\/([a-z-]+)/);
    const currentLang = match?.[1] || "en";
    document.querySelectorAll(".lang-option").forEach((btn) => {
        btn.classList.toggle("is-active", btn.dataset.lang === currentLang);
    });
    document.documentElement.classList.toggle(
        "translated-rtl",
        ["ar", "ur", "fa"].includes(currentLang),
    );
    const langLabels = {
        en: "EN",
        ar: "AR",
        ur: "UR",
        fa: "FA",
        hi: "HI",
        fr: "FR",
    };
    const utilLang = document.querySelector('.util-link[data-open="lang"]');
    if (utilLang)
        utilLang.textContent = `Languages · ${langLabels[currentLang] || currentLang.toUpperCase()}`;

    const isMobileNav = () => window.matchMedia("(max-width: 980px)").matches;

    const closeNavMenus = () => {
        header
            ?.querySelectorAll(".nav-item.is-open")
            .forEach((el) => el.classList.remove("is-open"));
    };

    const closeMobileNav = () => {
        nav?.classList.remove("is-open");
        header?.classList.remove("is-menu-open");
        header
            ?.querySelector(".menu-toggle")
            ?.setAttribute("aria-expanded", "false");
        closeNavMenus();
        setNavOpen(false);
    };

    const setNavOpen = (open) => {
        document.body.classList.toggle("is-nav-open", open && !isMobileNav());
        header?.classList.toggle("is-nav-open", open && !isMobileNav());
    };

    header?.querySelectorAll(".nav-item.has-menu").forEach((item) => {
        item.addEventListener("mouseenter", () => {
            if (isMobileNav()) return;
            closeNavMenus();
            item.classList.add("is-open");
            setNavOpen(true);
        });
        item.addEventListener("mouseleave", () => {
            if (isMobileNav()) return;
            item.classList.remove("is-open");
            if (!header.querySelector(".nav-item.is-open")) setNavOpen(false);
        });
        item.querySelector(":scope > .nav-label")?.addEventListener(
            "click",
            (event) => {
                if (!isMobileNav()) return;
                event.preventDefault();
                const opening = !item.classList.contains("is-open");
                closeNavMenus();
                item.classList.toggle("is-open", opening);
            },
        );
    });
    nav?.querySelectorAll(".mega a").forEach((link) => {
        link.addEventListener("click", () => {
            if (isMobileNav()) closeMobileNav();
        });
    });
    window.addEventListener("resize", () => {
        if (!isMobileNav()) closeMobileNav();
    });

    const track = document.getElementById("hero-track");
    const viewport = track?.parentElement;
    const originals = track ? [...track.querySelectorAll(".hero-slide")] : [];
    const dots = [...document.querySelectorAll("#hero-dots button")];
    let slides = originals;
    let index = 0;
    let timer;
    let animating = false;

    if (track && originals.length > 1) {
        const firstClone = originals[0].cloneNode(true);
        const lastClone = originals[originals.length - 1].cloneNode(true);
        firstClone.classList.add("is-clone");
        lastClone.classList.add("is-clone");
        firstClone.classList.remove("is-active");
        lastClone.classList.remove("is-active");
        track.insertBefore(lastClone, originals[0]);
        track.appendChild(firstClone);
        slides = [...track.querySelectorAll(".hero-slide")];
        index = 1;
    }

    const slideWidth = () => {
        const stageW = viewport?.offsetWidth || window.innerWidth;
        return Math.min(1170, stageW);
    };

    const position = (animate = true) => {
        if (!track || !viewport || !slides.length) return;
        const width = slideWidth();
        slides.forEach((slide) => {
            slide.style.flexBasis = `${width}px`;
            slide.style.width = `${width}px`;
        });
        const offset = (viewport.offsetWidth - width) / 2 - index * width;
        track.style.transition = animate ? "transform .55s ease" : "none";
        track.style.transform = `translate3d(${offset}px,0,0)`;
        const realCount = originals.length;
        const realIndex = (((index - 1) % realCount) + realCount) % realCount;
        slides.forEach((slide, i) =>
            slide.classList.toggle("is-active", i === index),
        );
        dots.forEach((dot, i) =>
            dot.classList.toggle("is-active", i === realIndex),
        );
    };

    const show = (next) => {
        if (!slides.length || animating) return;
        animating = true;
        index = next;
        position(true);
        window.setTimeout(() => {
            if (slides[index]?.classList.contains("is-clone")) {
                index = index === 0 ? originals.length : 1;
                position(false);
            }
            animating = false;
        }, 560);
    };

    const restart = () => {
        clearInterval(timer);
        if (originals.length) timer = setInterval(() => show(index + 1), 7000);
    };

    dots.forEach((dot, i) =>
        dot.addEventListener("click", () => {
            show(i + 1);
            restart();
        }),
    );
    document.querySelectorAll("[data-hero]").forEach((btn) => {
        btn.addEventListener("click", () => {
            show(btn.dataset.hero === "next" ? index + 1 : index - 1);
            restart();
        });
    });
    window.addEventListener("resize", () => position(false));
    position(false);
    restart();

    document.querySelectorAll(".faq-item button").forEach((btn) => {
        btn.addEventListener("click", () => {
            btn.parentElement.classList.toggle("is-open");
        });
    });

    document.querySelectorAll(".choice-group").forEach((group) => {
        group.querySelectorAll(".choice").forEach((choice) => {
            choice.addEventListener("click", () => {
                group
                    .querySelectorAll(".choice")
                    .forEach((item) => item.classList.remove("is-selected"));
                choice.classList.add("is-selected");
            });
        });
    });

    const bar = document.getElementById("site-header");
    const onScroll = () =>
        bar?.classList.toggle("is-scrolled", window.scrollY > 8);
    window.addEventListener("scroll", onScroll, { passive: true });
    onScroll();

    const sectorGrid = document.getElementById("industry-preview-grid");
    const sectorButtons = document.querySelectorAll("[data-sector]");

    if (sectorGrid && sectorButtons.length) {
        const getScrollAmount = () => {
            const firstCard = sectorGrid.querySelector("a");
            if (!firstCard) return 320;
            const gap = parseFloat(
                getComputedStyle(sectorGrid).columnGap ||
                    getComputedStyle(sectorGrid).gap ||
                    "16",
            );
            return firstCard.getBoundingClientRect().width + gap;
        };

        let isDragging = false;
        let startX = 0;
        let startScrollLeft = 0;

        sectorGrid.addEventListener("pointerdown", (event) => {
            isDragging = true;
            startX = event.clientX;
            startScrollLeft = sectorGrid.scrollLeft;
            sectorGrid.classList.add("is-dragging");
            sectorGrid.setPointerCapture(event.pointerId);
        });

        sectorGrid.addEventListener("pointermove", (event) => {
            if (!isDragging) return;
            const delta = event.clientX - startX;
            sectorGrid.scrollLeft = startScrollLeft - delta;
        });

        const stopDragging = () => {
            isDragging = false;
            sectorGrid.classList.remove("is-dragging");
        };

        sectorGrid.addEventListener("pointerup", stopDragging);
        sectorGrid.addEventListener("pointerleave", stopDragging);
        sectorGrid.addEventListener("pointercancel", stopDragging);
        sectorGrid.addEventListener("lostpointercapture", stopDragging);

        sectorButtons.forEach((button) => {
            button.addEventListener("click", () => {
                const direction = button.dataset.sector === "next" ? 1 : -1;
                sectorGrid.scrollBy({
                    left: getScrollAmount() * direction,
                    behavior: "smooth",
                });
            });
        });
    }

    /* ---------- Home page entrance animations ---------- */
    const isHomePage = document.body.classList.contains("page-home");

    if (isHomePage && "IntersectionObserver" in window) {
        document.documentElement.classList.add("anim-on");

        const countUp = (el, delay) => {
            const finalText = el.textContent.trim();
            const parts = finalText.match(/^([^\d]*)([\d.,]+)(.*)$/);
            if (!parts) return;
            const [, prefix, rawNumber, suffix] = parts;
            const value = parseFloat(rawNumber.replace(/,/g, ""));
            if (!Number.isFinite(value)) return;
            const decimals = (rawNumber.split(".")[1] || "").length;
            const useGrouping = rawNumber.includes(",") || value >= 1000;
            const format = (current) =>
                prefix +
                current.toLocaleString("en-US", {
                    minimumFractionDigits: decimals,
                    maximumFractionDigits: decimals,
                    useGrouping,
                }) +
                suffix;
            const duration = 1500;
            let start;
            const step = (now) => {
                if (start === undefined) start = now;
                const progress = Math.min(1, (now - start) / duration);
                const eased = 1 - Math.pow(1 - progress, 3);
                el.textContent = format(value * eased);
                if (progress < 1) window.requestAnimationFrame(step);
                else el.textContent = finalText;
            };
            window.setTimeout(() => window.requestAnimationFrame(step), delay);
        };

        const statsStrip = document.querySelector(".stats-strip");
        if (statsStrip) {
            const statObserver = new IntersectionObserver(
                (entries) => {
                    entries.forEach((entry) => {
                        if (!entry.isIntersecting) return;
                        statObserver.disconnect();
                        statsStrip
                            .querySelectorAll(".stat-cell strong")
                            .forEach((el, i) => countUp(el, i * 120));
                    });
                },
                { threshold: 0.2 },
            );
            statObserver.observe(statsStrip);
        }

        const revealObserver = new IntersectionObserver(
            (entries) => {
                entries.forEach((entry) => {
                    if (!entry.isIntersecting) return;
                    const el = entry.target;
                    revealObserver.unobserve(el);
                    const delay = Number(el.dataset.revealDelay || 0);
                    if (delay)
                        el.style.setProperty("--reveal-delay", `${delay}ms`);
                    el.classList.add("is-in");
                    window.setTimeout(() => {
                        el.classList.remove("reveal", "is-in");
                        el.style.removeProperty("--reveal-delay");
                    }, 780 + delay);
                });
            },
            { threshold: 0.05, rootMargin: "0px 0px -8% 0px" },
        );

        const revealGroups = [
            [".stats-strip .stat-cell", 70],
            [".stats-trust", 0],
            [".journey > .kicker, .journey > h2, .journey > p", 80],
            [".journey-grid .journey-step", 70],
            [
                ".industry-preview-header, .industry-preview-subtitle, .sector-controls, .industry-preview .cta-row",
                80,
            ],
            ["#industry-preview-grid > a", 60],
            [".app-split-copy > *", 80],
            [".app-split-gallery img", 110],
            [".newsletter-block > div", 140],
            [".news-block > .kicker, .news-block > h2", 90],
            [".news-grid .news-card", 90],
            [
                ".awards-block > .kicker, .awards-block > h2, .awards-block > p",
                90,
            ],
            [".awards-track .award-card", 90],
            [".certs-block > .kicker, .certs-block > h2", 90],
            [".cert-logo", 45],
            [".certs-block .cert-pill", 70],
            [
                ".cta-banner .kicker, .cta-banner h2, .cta-banner > div > p, .cta-banner .cta-row",
                90,
            ],
        ];

        revealGroups.forEach(([selector, stagger]) => {
            document.querySelectorAll(selector).forEach((el, i) => {
                if (el.classList.contains("reveal")) return;
                el.classList.add("reveal");
                el.dataset.revealDelay = String(i * stagger);
                revealObserver.observe(el);
            });
        });
    }
})();
