let countSpan = document.querySelector(".quiz-info .count span");
let bulletsParent = document.querySelector(".bullets .spans");
let bullets = document.querySelector(".bullets");
let wrongQuestDiv = document.querySelector(".wrong-quest");
let quizArea = document.querySelector(".quiz-area");
// let wrongQuizArea = document.querySelector(".wrong-quiz-area");
let answersArea = document.querySelector(".answers-area");
// let wrongAnswersArea = document.querySelector(".wrong-answers-area");
let submitButton = document.querySelector(".submit-button");
let resultsDiv = document.querySelector(".results");
let theCounter = document.querySelector(".counter");


let currentQindex = 0;
let rightAnswers = 0;
let wrongQuestsArray = [];
let wrongAnswerArray = [];
function getQuestions(){
    let myRequest = new XMLHttpRequest();
    
    myRequest.onreadystatechange = function(){
        if (this.readyState === 4 && this.status === 200) {
            let questionsObject = JSON.parse(this.responseText);
            let questionCount = questionsObject.length;
            setInterval(counterUp,1000,questionCount);
            // console.log(questionCount);
            //create bullets + set questions count
            createBullets(questionCount);
            addQuestionData(questionsObject[currentQindex], questionCount);
            // counterUp(questionCount);
            
            submitButton.onclick = () => {
                let rightAnswer = questionsObject[currentQindex].right_answer;
                // console.log(rightAnswer);
                let selected = document.querySelector('input[name="question"]:checked');
                if (selected) {
                    // console.log('no radio is selected');
                    checkAnswer(rightAnswer,questionCount,currentQindex);
                    currentQindex++;
                    quizArea.innerHTML = "";
                    answersArea.innerHTML = "";
                    addQuestionData(questionsObject[currentQindex], questionCount);
                }
                if (currentQindex === questionCount) {
                    console.log("questions finished");
                    showWrongQuestions(questionsObject, wrongQuestsArray, wrongAnswerArray);
                    
                }
                handleBullets();
                showResult(questionCount);
            };
            // setTimeout(counterUp(questionCount),1000);
        }
    }
    
    myRequest.open("GET", "js/revesion_mcq.json", true);
    myRequest.send();
}

getQuestions();

function createBullets(num){
    countSpan.innerHTML = num;//`${num} <span class="remaining">(${num - currentQindex} left)</span>`;
    
    //create spans
    for (let i = 0; i < num; i++) {
        let theBullet = document.createElement("span");
        if (i === 0) {
            theBullet.classList.add("on");
        }
        bulletsParent.appendChild(theBullet);
    }
}
function addQuestionData(qObject, count){
    countSpan.innerHTML = `${count} <span class="remaining">(${count - currentQindex} left)</span>`;
    if (currentQindex <  count) {
        let questionTitle = document.createElement("h2");
        
        let questionText = document.createTextNode(qObject.title);
        questionTitle.appendChild(questionText);
        quizArea.appendChild(questionTitle);
        // create answers
        let answersArray = Object.values(qObject.answers);
        // console.log(answersArray);
        shuffle(answersArray);
        for (let i = 0; i < answersArray.length; i++) {
            
        // console.log(answersArray[i]);
        let mainDiv = document.createElement("div");
        mainDiv.className = 'answer';
        let radioInput = document.createElement("input");
        radioInput.name = 'question';
        radioInput.type = 'radio';
        radioInput.id = `answer_${i+1}`;
        radioInput.dataset.answer = answersArray[i]; //qObject.answers[`answer_${i+1}`]
        
        let theLabel = document.createElement("label");
        theLabel.htmlFor = `answer_${i+1}`;
        let labelText = document.createTextNode(answersArray[i]);
        theLabel.appendChild(labelText);
        
        mainDiv.appendChild(radioInput);
        mainDiv.appendChild(theLabel);
        answersArea.appendChild(mainDiv);
    }
}
}
function shuffle(array){
    for (let i = array.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [array[i], array[j]] = [array[j], array[i]];
    }
    return array;
}
function checkAnswer(rAnswer, qCount, currentQindex){
    let theChoosenAnswer;
    let answers = document.getElementsByName("question");
    for (let i = 0; i < answers.length; i++) {
        if (answers[i].checked) {
            theChoosenAnswer = answers[i].dataset.answer;
        }
    }
    // console.log(`right answer is ${rAnswer}`);
    // console.log(`choosen answer is ${theChoosenAnswer}`);
    if (theChoosenAnswer === rAnswer) {
        rightAnswers++;
        // console.log(rightAnswers);
    }else{
        wrongQuestsArray.push(currentQindex);
        wrongAnswerArray.push(theChoosenAnswer);
        // console.log(wrongQuestsArray);
        // console.log(wrongAnswerArray);
    }
}
function handleBullets(){
    let bulletsSpans = document.querySelectorAll(".bullets .spans span");
    let bulletsArray = Array.from(bulletsSpans);
    bulletsArray.forEach((span, index) =>{
        if (currentQindex === index) {
            span.className = "on";
        }
    });
    
}
function showResult(count){
    let theResult;
    if (currentQindex === count) {
        quizArea.remove();
        answersArea.remove();
        submitButton.remove();
        bulletsParent.remove();

        if (rightAnswers >= (count/2) && rightAnswers < count) {
            theResult = `<span class="good">Good</span> You answered ${rightAnswers} From ${count}`;
        }else if (rightAnswers === count) {
            theResult = `<span class="perfect">Perfect</span> You answered ${rightAnswers} From ${count}`;
        } else{
            theResult = `<span class="bad">Bad</span> You answered ${rightAnswers} From ${count}`;
        }
        resultsDiv.innerHTML = theResult;
        resultsDiv.style.padding = "10px";
        resultsDiv.style.backgroundColor = "white";
        resultsDiv.style.marginTop = "10px";


    }
}
function showWrongQuestions(qObject, wrongQuestsArr, wrongAnswerArr){
    
    for (let i = 0; i < wrongQuestsArr.length; i++) {
        wrongQuestDiv.style.display ="block";
        //<div class="wrong-quiz-area"></div>
        // <div class="wrong-answers-area"></div>
        let wrongQuizArea = document.createElement("div");
        wrongQuizArea.classList = "wrong-quiz-area";
        let wrongAnswersArea = document.createElement("div");
        wrongAnswersArea.classList = "wrong-answers-area";
        let questionTitle = document.createElement("h2");
        let questionText = document.createTextNode(qObject[wrongQuestsArr[i]].title);
        questionTitle.appendChild(questionText);
        // console.log(qObject[wrongQuestsArr[i]]);
        wrongQuizArea.appendChild(questionTitle);
        console.log(wrongQuestsArr[i]);
        console.log(wrongAnswerArr[i]);
        
        
        // console.log(questionText);
        // create answers
        let answersArray = Object.values(qObject[wrongQuestsArr[i]].answers);
        console.log(answersArray);
        // shuffle(answersArray);
        let answerText;
        for (let j = 0; j < answersArray.length; j++) {
            let mainDiv = document.createElement("div");
            mainDiv.className = 'answer';
            let answer = document.createElement("div");
            answerText  = document.createTextNode(answersArray[j]);
            answer.appendChild(answerText);
            mainDiv.appendChild(answer);
            wrongAnswersArea.appendChild(mainDiv);
            console.log(answersArray[i]);
            
            if (qObject[wrongQuestsArr[i]].right_answer === answersArray[j]) {
                //questionsObject[currentQindex].right_answer
                answer.className = 'right';
            }
            if (wrongAnswerArr[i] === answersArray[j]) {
                answer.className = 'wrong';
            }
        }
        wrongQuestDiv.appendChild(wrongQuizArea);
        wrongQuestDiv.appendChild(wrongAnswersArea);
    }
}


let seconds= "00" ;
let minutes = "00";
let hours = "00";
function counterUp(count){
    if (currentQindex < count) {
        // console.log(count);
        seconds++;
        if (seconds === 60) {
            minutes++;
            seconds = 0;
        }
        if (minutes === 60) {
            hours++;
            minutes = 0;
        }
        hours = hours<10?`0${parseInt(hours)}`:hours;
        minutes = minutes<10?`0${parseInt(minutes)}`:minutes;
        seconds = seconds<10?`0${seconds}`:seconds;
        
        theCounter.innerHTML = `${hours} : ${minutes} : ${seconds}`;
    }
    // console.log( `${minutes} : ${seconds}`);
}