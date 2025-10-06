(() => {
	const initializeModes = (container) => {
		const modeButtons = Array.from(
			container.querySelectorAll('.author-write__mode-button')
		);
		const resetButton = container.querySelector('.author-write__reset');

		if (modeButtons.length === 0 || !resetButton) {
			return;
		}

		const showAllModes = () => {
			modeButtons.forEach((button) => {
				button.classList.remove('is-active');
				button.setAttribute('aria-pressed', 'false');
				button.hidden = false;
				button.removeAttribute('aria-hidden');
			});

			container.classList.remove('author-write--mode-active');
			resetButton.hidden = true;
		};

		const activateMode = (activeButton) => {
			modeButtons.forEach((button) => {
				const isActive = button === activeButton;
				button.classList.toggle('is-active', isActive);
				button.setAttribute('aria-pressed', isActive ? 'true' : 'false');
				button.hidden = !isActive;
				button.toggleAttribute('aria-hidden', !isActive);
			});

			container.classList.add('author-write--mode-active');
			resetButton.hidden = false;
		};

		modeButtons.forEach((button) => {
			button.addEventListener('click', () => {
				activateMode(button);
			});
		});

		resetButton.addEventListener('click', () => {
			showAllModes();
			modeButtons[0]?.focus();
		});

		// Ensure initial state reflects markup defaults.
		modeButtons.forEach((button) => {
			const isActive = button.classList.contains('is-active');
			button.setAttribute('aria-pressed', isActive ? 'true' : 'false');
		});

		resetButton.hidden = true;
	};

	const boot = () => {
		document
			.querySelectorAll('.author-write')
			.forEach((container) => initializeModes(container));
	};

	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', boot);
	} else {
		boot();
	}
})();
