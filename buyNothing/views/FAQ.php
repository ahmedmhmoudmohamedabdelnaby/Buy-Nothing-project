<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        @import url(https://fonts.googleapis.com/css?family=Raleway);

body {
  color: #333;
  background: #fcfcfc;
  font-family: 'Raleway', sans-serif;
  overflow-x: hidden;
}

.faq-header{
  font-size: 42px;
  border-bottom: 1px dotted #ccc;
  padding: 24px;
}

.faq-content {
  margin: 0 auto;
}

.faq-question {
  padding: 20px 0;
  border-bottom: 1px dotted #ccc;
}

.panel-title {
  font-size: 24px;
  width: 100%;
  position: relative;
  margin: 0;
  padding: 10px 10px 0 48px;
  display: block;
  cursor: pointer;
}

.panel-content {
  font-size: 20px;
  padding: 0px 14px;
  margin: 0 40px;
  height: 0;
  overflow: hidden;
  z-index: -1;
  position: relative;
  opacity: 0;
  -webkit-transition: .4s ease;
  -moz-transition: .4s ease;
  -o-transition: .4s ease;
  transition: .4s ease;
}

.panel:checked ~ .panel-content{
  height: auto;
  opacity: 1;
  padding: 14px;
}

.plus {
  position: absolute;
  margin-left: 20px;
  margin-top: 4px;
  z-index: 5;
  font-size: 42px;
  line-height: 100%;
  -webkit-user-select: none;    
  -moz-user-select: none;
  -ms-user-select: none;
  -o-user-select: none;
  user-select: none;
  -webkit-transition: .2s ease;
  -moz-transition: .2s ease;
  -o-transition: .2s ease;
  transition: .2s ease;
}

.panel:checked ~ .plus {
  -webkit-transform: rotate(45deg);
  -moz-transform: rotate(45deg);
  -o-transform: rotate(45deg);
  transform: rotate(45deg);
}

.panel {
  display: none;
}
.button {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
    </style>
</head>
<body>
    <div class="faq-header">Frequently Asked Questions</div>

<div class="faq-content">
  <div class="faq-question">
    <input id="q1" type="checkbox" class="panel">
    <div class="plus">+</div>
    <label for="q1" class="panel-title">What is this program</label>
    <div class="panel-content">The program is a social movement that promotes community-based exchange and collaboration</div>
  </div>
  
  <div class="faq-question">
    <input id="q2" type="checkbox" class="panel">
    <div class="plus">+</div>
    <label for="q2" class="panel-title">What is the purpose of this programme</label>
    <div class="panel-content">The program aims to reduce waste and excessive consumption by sharing resources and material items among individuals in the same neighborhood or community.</div>

  </div>
  <br>
<br>
<br>
<br>
<form method='post'>
<button><a href="index.php"class="button">back</button></a>
</form>
</div>
</body>
</html>