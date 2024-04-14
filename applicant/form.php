<!DOCTYPE html>
<html>
<head>
    <title>Multi-step Form</title>
    <style>
        .form-container {
            width: 400px;
            margin: 0 auto;
            position: relative;
        }

        .progress-bar {
            display: flex;
            justify-content: space-between;
            padding: 10px;
            background-color: #ddd;
            border-radius: 5px;
        }

        .step {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background-color: #ccc;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-weight: bold;
        }

        .step.active {
            background-color: #4CAF50;
        }

        .form {
            margin-top: 20px;
        }

        .form-step {
            display: none;
        }

        .form-step.active {
            display: block;
        }

        .next-btn,
        .prev-btn {
            display: block;
            margin-top: 10px;
            padding: 5px 10px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .prev-btn {
            margin-top: 0;
            background-color: #ddd;
            color: #333;
        }
    </style>
</head>
<body>

<div class="form-container">
  <div class="progress-bar">
    <div class="step active">1</div>
    <div class="step">2</div>
    <div class="step">3</div>
    <div class="step">4</div>
    <div class="step">5</div>
    <div class="step">6</div>
    <div class="step">7</div>
    <div class="step">8</div>
  </div>
  <form class="form">
  <div class="form-step form-step-1 active">
    <h2>Step 1: Personal Information</h2>
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>
    <button type="button" class="next-btn">Next</button>
  </div>
  <div class="form-step form-step-2">
    <h2>Step 2: Contact Information</h2>
    <label for="email2">Email:</label>
    <input type="email" id="email2" name="email" required>
    <button type="button" class="prev-btn">Previous</button>
    <button type="button" class="next-btn">Next</button>
  </div>

  <div class="form-step form-step-3">
    <h2>Step 3: Contact Information</h2>
    <label for="email3">Email:</label>
    <input type="email" id="email3" name="email" required>
    <button type="button" class="prev-btn">Previous</button>
    <button type="button" class="next-btn">Next</button>
  </div>

  <div class="form-step form-step-4">
    <h2>Step 4: Contact Information</h2>
    <label for="email4">Email:</label>
    <input type="email" id="email4" name="email" required>
    <button type="button" class="prev-btn">Previous</button>
    <button type="button" class="next-btn">Next</button>
  </div>

  <div class="form-step form-step-5">
    <h2>Step 5: Contact Information</h2>
    <label for="email5">Email:</label>
    <input type="email" id="email5" name="email" required>
    <button type="button" class="prev-btn">Previous</button>
    <button type="button" class="next-btn">Next</button>
  </div>

  <div class="form-step form-step-6">
    <h2>Step 6: Contact Information</h2>
    <label for="email6">Email:</label>
    <input type="email" id="email6" name="email" required>
    <button type="button" class="prev-btn">Previous</button>
    <button type="button" class="next-btn">Next</button>
  </div>

  <div class="form-step form-step-7">
    <h2>Step 7: Contact Information</h2>
    <label for="email7">Email:</label>
    <input type="email" id="email7" name="email" required>
    <button type="button" class="prev-btn">Previous</button>
    <button type="button" class="next-btn">Next</button>
  </div>

  <div class="form-step form-step-8">
    <h2>Step 8: Contact Information</h2>
    <label for="email8">Email:</label>
    <input type="email" id="email8" name="email" required>
    <button type="button" class="prev-btn">Previous</button>
    <button type="submit" class="submit-btn">Submit</button>
  </div>
</form>

</div>

<script>
const form = document.querySelector('.form');
const steps = document.querySelectorAll('.form-step');
const nextBtns = document.querySelectorAll('.next-btn');
const prevBtns = document.querySelectorAll('.prev-btn');

let currentStep = 0;

const showStep = (step) => {
  steps.forEach((s, index) => {
    if (index === step) {
      s.classList.add('active');
    } else {
      s.classList.remove('active');
    }
  });

  updateButtons();
};

const updateButtons = () => {
  if (currentStep === 0) {
    prevBtns[0].style.display = 'none';
  } else {
    prevBtns[0].style.display = 'inline-block';
  }

  if (currentStep === steps.length - 1) {
    nextBtns[currentStep].style.display = 'none';
    document.querySelector('.submit-btn').style.display = 'inline-block';
  } else {
    nextBtns[currentStep].style.display = 'inline-block';
    document.querySelector('.submit-btn').style.display = 'none';
  }
};

const handleNextButtonClick = (e) => {
  e.preventDefault();
  currentStep++;
  showStep(currentStep);
};

const handlePrevButtonClick = (e) => {
  e.preventDefault();
  currentStep--;
  showStep(currentStep);
};

nextBtns.forEach((btn) => btn.addEventListener('click', handleNextButtonClick));
prevBtns.forEach((btn) => btn.addEventListener('click', handlePrevButtonClick));

showStep(currentStep);
</script>

</body>
</html>
