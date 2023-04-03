document.addEventListener('DOMContentLoaded', () => {
	const startButton = document.getElementById('start-button');
	const resetButton = document.getElementById('reset-button');
	const heightInput = document.getElementById('height');
	const widthInput = document.getElementById('width');

	let flippedCards = [];
	let matchedCards = 0;
	let canFlip = false;

	function generateBoard(width, height) {
		const gameBoard = document.querySelector('.game-board');
		gameBoard.innerHTML = '';
		gameBoard.style.gridTemplateColumns = `repeat(${width}, 1fr)`;

		if ((width * height) % 2 !== 0) {
			alert('Prosím vyberte si sudý počet karet na hracím poli');
			return;
		}

		const cards = [];
		for (let i = 0; i < (width * height) / 2; i++) {
			cards.push(i % 25);
			cards.push(i % 25);
		}

		const shuffledCards = cards.sort(() => 0.5 - Math.random());

		for (let i = 0; i < width * height; i++) {
			const card = document.createElement('div');
			card.className = 'card';
			card.dataset.card = shuffledCards[i];
			card.innerHTML = `<img src='images/${
				images[shuffledCards[i]]
			}.png' alt='${images[shuffledCards[i]]}'>`;

			gameBoard.appendChild(card);
		}

		return document.querySelectorAll('.card');
	}

	function initializeGame() {
		const cardElements = generateBoard(widthInput.value, heightInput.value);

		cardElements.forEach((card) => {
			card.addEventListener('click', () => {
				if (!canFlip || card.querySelector('img').style.display === 'block')
					return;

				card.querySelector('img').style.display = 'block';
				flippedCards.push(card);

				if (flippedCards.length === 2) {
					canFlip = false;

					if (flippedCards[0].dataset.card === flippedCards[1].dataset.card) {
						matchedCards += 2;
						flippedCards = [];

						if (matchedCards === cardElements.length) {
							setTimeout(() => {
								alert('Gratulujeme, vyhráli jste!');
							}, 500);
						}
					} else {
						setTimeout(() => {
							flippedCards[0].querySelector('img').style.display = 'none';
							flippedCards[1].querySelector('img').style.display = 'none';
							flippedCards = [];
						}, 1000);
					}

					setTimeout(() => {
						canFlip = true;
					}, 1000);
				}
			});
		});

		startButton.addEventListener('click', () => {
			cardElements.forEach((card) => {
				card.querySelector('img').style.display = 'block';
			});

			setTimeout(() => {
				cardElements.forEach((card) => {
					card.querySelector('img').style.display = 'none';
				});
				canFlip = true;
			}, 2000);
		});

		resetButton.addEventListener('click', () => {
			matchedCards = 0;
			flippedCards = [];
			canFlip = false;
			initializeGame();
		});
	}

	heightInput.addEventListener('change', () => {
		initializeGame();
	});

	widthInput.addEventListener('change', () => {
		initializeGame();
	});

	initializeGame();
});
