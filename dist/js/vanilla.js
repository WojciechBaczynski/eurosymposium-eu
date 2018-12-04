header = {};
header.sentences = [];
overview = {};
keynoteSpeach = {};

// Main InitView Function
window.onload = function() {
  // Pass here all functions which should start at the beginning
  header.initHeaderView();
};

// ------------------- HEADER -------------------
header.initHeaderView = function() {
  header.getSentenceContent();
};

header.setSentence = function(year, text) {
  var sentenceYear = document.querySelector(
    ".welcome-wrapper--sentence-content-year"
  );
  var sentenceText = document.querySelector(
    ".welcome-wrapper--sentence-content-text"
  );

  sentenceYear.textContent = year;
  sentenceText.textContent = text;
};

header.getSentenceContent = function() {
  var sentences = header.sentences;
  var arrYear;
  var arrText;

  sentences.forEach(function(sentence) {
    arrYear = sentence.year;
    arrText = sentence.sentence;
    header.setSentence(arrYear, arrText);
    setTimeout;
  });

  // arrYear = "sentences[1].year";
  // arrText = "sentences[1].sentence";
  // header.setSentence(arrYear, arrText);
};

// ------------------- OVERVIEW -------------------

// ------------------- ANOTHER SECTION -------------------

// Long arrays and HTML templates leave at the bottom of the file
header.sentences = [
  {
    country: "poland",
    year: "51 LAT (1967-2018)",
    sentence: "GDAŃSKIEJ INFORMATYKI EKONOMICZNEJ"
  },
  {
    country: "england",
    year: "51 YEARS (1967-2018) OF",
    sentence: "BUSINESS INFORMATICS AT UNIVERSITY OF GDANSK"
  },
  {
    country: "bulgari",
    year: "51 ГОДИНИ (1967-2018)",
    sentence: "НА БИЗНЕС ИНФОРМАТИКАВ УНИВЕРСИТЕТА НА ГДАНСК"
  },
  {
    country: "china",
    year: "格但斯克大学商务信息学五十周年(1967-2018)",
    sentence: ""
  },
  {
    country: "croatia",
    year: "51 GODINA (1967-2018)",
    sentence: "POSLOVNE INFORMATIKE NA SVEUČILIŠTU U GDANJSKU"
  },
  {
    country: "czech",
    year: "51 LET (1967-2018)",
    sentence: "BUSINESS INFORMATIKY NA UNIVERZITĚ V GDAŇSKU"
  },
  {
    country: "netherlands",
    year: "51 JAAR (1967-2018)",
    sentence: "BEDRIJFSINFORMATICA AAN DE UNIVERSITEIT VAN GDANSK"
  },
  {
    country: "finland",
    year: "51 VUOTTA (1967-2018)",
    sentence: "LIIKETOIMINTAINFORMATIIKKAA GDANSKIN YLIOPISTOSSA"
  },
  {
    country: "france",
    year: "51 ANS (1967-2018)",
    sentence: "DE L’INFORMATIQUE DE GESTION À L'UNIVERSITÉ DE GDANSK"
  },
  {
    country: "germany",
    year: "51 JAHRE (1967-2018)",
    sentence: "WIRTSCHAFTSINFORMATIK AN DER UNIVERSITÄT DANZIG"
  },
  {
    country: "israel",
    year:
      "יובל הזהב 51 שנים (1967 - 2018) של אינפורמטיקה עסקית באוניברסיטת גדנסק, פולין",
    sentence: ""
  },
  {
    country: "italy",
    year: "51 ANNI (1967-2018)",
    sentence: "DELL’INFORMATICA AZIENDALE ALL’UNIVERSITA’ DI DANZICA"
  },
  {
    country: "korea",
    year: "51주년 (1967 - 2018) 기념 학술대회",
    sentence: ""
  },
  {
    country: "lithuania",
    year: "51 METŲ (1967-2018)",
    sentence: "GDANSKO UNIVERSITETE"
  },
  {
    country: "norway",
    year: "51 JAHRE (1967-2018)",
    sentence: "WIRTSCHAFTSINFORMATIK AN DER UNIVERSITÄT GDANSK"
  },
  {
    country: "portugal",
    year: "51 ANOS (1967-2018)",
    sentence: "DA INFORMÁTICA DE GESTÃO NA UNIVERSIDADE DE GDANSK"
  },
  {
    country: "romania",
    year: "51 DE ANI (1967-2018)",
    sentence:
      "A SPECIALIZARII INFORMATICA ECONOMICA LA UNIVERSITATEA DIN GDANSK"
  },
  {
    country: "romania",
    year: "51 ЛЕТ (1967-2018)",
    sentence: "БИЗНЕС-ИНФОРМАТИКА УНИВЕРСИТЕТ ГДАНЬСКА, ПОЛЬША"
  },
  {
    country: "slovakia",
    year: "51 ROKOV (1967-2018)",
    sentence: "BUSINESS INFORMATIKY NA UNIVERZITE V GDANSKU"
  },
  {
    country: "slovenia",
    year: "51 LET (1967-2018)",
    sentence: "POSLOVNE INFORMATIKE NA UNIVERZI V GDANSKU"
  },
  {
    country: "spain",
    year: "51 AÑOS (1967-2018)",
    sentence: "DE INFORMÁTICA DE NEGOCIOS DE LA UNIVERSIDAD DE GDANSK"
  },
  {
    country: "sweden",
    year: "51 ÅR (1967-2018)",
    sentence: "AV INFORMATIK VID UNIVERSITET GDANSK"
  },
  {
    country: "turkey",
    year: "GDANSK ÜNİVERSİTESİ'NDE 51 YILLIK (1967 - 2018)",
    sentence: "İŞLETME ENFORMATİĞİ"
  },
  {
    country: "ukraine",
    year: "51 РОКІВ (1967-2018)",
    sentence: "БІЗНЕС-ІНФОРМАТИКА УНІВЕРСИТЕТ ГДАНСЬКА, ПОЛЬЩА"
  }
];
