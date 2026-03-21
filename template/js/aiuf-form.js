let questions = [];
let currentIndex = 0;
let userAnswers = {};
let cachedAIResponse = '';

const questionEl = document.getElementById('question');
const inputArea = document.getElementById('input-area');
const prevBtn = document.getElementById('prev');
const nextBtn = document.getElementById('next');
const submitBtn = document.getElementById('submit');
const aiResponseEl = document.getElementById('ai-response');


submitBtn.disabled = true;
nextBtn.disabled = true;

fetch(QUESTIONS_URL)
    .then((res) => res.json())
    .then((data) => {
        questions = data;
        showQuestion(currentIndex);
    })
    .catch((err) => console.error('Error loading questions:', err));

function showQuestion(index) {
    if (index < 0 || index >= questions.length) return;

    const q = questions[index];
    questionEl.textContent = q.question;
    inputArea.innerHTML = '';

    if (q.type === 'options') {
        q.options.forEach((opt) => {
            const btn = document.createElement('button');
            btn.textContent = opt;

            // Styling
            btn.style.padding = '12px 14px';

            btn.style.fontSize = '15px';
            btn.style.fontWeight = '600';
            btn.style.borderRadius = '8px';
            btn.style.border = '1px solid rgba(0,0,0,0.2)';
            btn.style.background = 'linear-gradient(135deg, #ffffff, #f2f2f2)';
            btn.style.color = '#333';
            btn.style.cursor = 'pointer';
            btn.style.transition = 'all 0.25s ease';
            btn.style.boxShadow = '0 3px 8px rgba(0,0,0,0.15)';
            btn.style.flex = '1 1 calc(50% - 10px)';
            btn.style.maxWidth = 'calc(50% - 10px)';
            btn.style.textAlign = 'center';

            btn.onmouseenter = () => {
                btn.style.transform = 'translateY(-2px)';
                btn.style.boxShadow = '0 6px 14px rgba(0,0,0,0.25)';
            };

            btn.onmouseleave = () => {
                btn.style.transform = 'none';
                btn.style.boxShadow = '0 3px 8px rgba(0,0,0,0.15)';
            };

            btn.onclick = () => {
                userAnswers[q.question] = opt;
                highlightSelected(opt);
                updateButtonStates();
            };

            inputArea.appendChild(btn);
        });

        highlightSelected(userAnswers[q.question]);

    } else if (q.type === 'text') {
        const input = document.createElement('input');
        input.type = 'text';
        input.placeholder = 'Type your answer...';
        input.value = userAnswers[q.question] || '';

        input.oninput = () => {
            userAnswers[q.question] = input.value;
            updateButtonStates();
        };

        inputArea.appendChild(input);
    }

    updateButtonStates();
}

function highlightSelected(selectedValue) {
    const buttons = inputArea.querySelectorAll('button');
    buttons.forEach((btn) => {
        btn.style.backgroundColor =
            btn.textContent === selectedValue ? 'lightgreen' : '';
    });
}

function isAnswered(index) {
    const q = questions[index];
    const answer = userAnswers[q.question];

    if (q.type === 'options') {
        return !!answer;
    }

    if (q.type === 'text') {
        return answer && answer.trim() !== '';
    }

    return false;
}

function updateButtonStates() {
    prevBtn.disabled = currentIndex === 0;

    // Next button
    nextBtn.disabled =
        !isAnswered(currentIndex) ||
        currentIndex === questions.length - 1;

    // Submit button
    submitBtn.disabled =
        !(currentIndex === questions.length - 1 &&
          isAnswered(currentIndex));
}

prevBtn.addEventListener('click', () => {
    if (currentIndex > 0) {
        currentIndex--;
        showQuestion(currentIndex);
    }
});

nextBtn.addEventListener('click', () => {
    if (!isAnswered(currentIndex)) {
        alert('This question is required.');
        return;
    }

    if (currentIndex < questions.length - 1) {
        currentIndex++;
        showQuestion(currentIndex);
    }
});

