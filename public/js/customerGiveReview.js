$("textarea").keyup(function () {
  var characterCount = $(this).val().length,
    current = $("#current"),
    maximum = $("#maximum"),
    theCount = $("#the-count");

  current.text(characterCount);

  if (characterCount < 70) {
    current.css("color", "#666");
  }
  if (characterCount > 70 && characterCount < 90) {
    current.css("color", "#6d5555");
  }
  if (characterCount > 90 && characterCount < 100) {
    current.css("color", "#793535");
  }
  if (characterCount > 100 && characterCount < 120) {
    current.css("color", "#841c1c");
  }
  if (characterCount > 120 && characterCount < 139) {
    current.css("color", "#8f0001");
  }

  if (characterCount >= 140) {
    maximum.css("color", "#8f0001");
    current.css("color", "#8f0001");
  } else {
    maximum.css("color", "#666");
  }
});

function fnCheckForRestrictedWords() {
  console.log("fnCheckForRestrictedWords");
  // array of restricted words
  var restrictedWords = [
    "fuck",
    "shit",
    "ass",
    "bitch",
    ",",
    ".",
    "?",
    ":",
    ";",
    "*",
    "^",
    "(",
    ")",
    "[",
    "]",
    "{",
    "}",
    "|",
    "\\",
    "/",
  ];

  var txtInput = document.getElementById("the-textarea").value;
  var error = 0;
  for (var i = 0; i < restrictedWords.length; i++) {
    var val = restrictedWords[i];
    if (txtInput.toLowerCase().indexOf(val.toString()) > -1) {
      error = error + 1;
    }
  }

  if (error > 0) {
    console.log("error");
    document.getElementById("mainbox").style.display = "none";
    document.getElementById("containn").style.display = "block";
  } else {
    window.location = "/review/store/" + txtInput;
  }
}
