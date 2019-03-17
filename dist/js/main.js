var header = {};
header.images = [];
header.sentences = [];
var overview = {};
var keynoteSpeach = {};
var releventTopics = {};
var navbarObj = {};

var numberCarousel = 0;
var numberCountry = 0;
var carouselInterval;
var countriesInterval;

// Main InitView Function
window.onload = function () {
  // Pass here all functions which should start at the beginning
  header.initHeaderView();
  navbarObj.initNavbarView();
  releventTopics.initReleventTopicView();
};

// ------------------- HEADER -------------------
header.initHeaderView = function () {
    header.getNextSentence();
    header.getNextImage();
};

header.setCarousel = function (main, prev, next) {
  var mainImage = document.querySelector(
    ".welcome-wrapper__carousel-slider"
  );
  var prevImage = document.querySelector(
    ".welcome-wrapper__carousel-slider-prev"
  );
  var nextImage = document.querySelector(
    ".welcome-wrapper__carousel-slider-next"
  );
  mainImage.src = main;
  prevImage.src = prev;
  nextImage.src = next;
};

header.getCarouselContent = function () {
  var images = header.images;
  var indicators = document.querySelectorAll(".welcome-wrapper__indicators-indicator");
  if (numberCarousel == images.length) {
    numberCarousel = 0;
  } else if (numberCarousel < 0) {
    numberCarousel = images.length - 1;
  }
  var prevNumber = numberCarousel-1;
  if(prevNumber<0) {
    prevNumber=4;
  }
  var nextNumber = numberCarousel+1;
  if(nextNumber>4) {
    nextNumber=0;
  }
  var mainImage = images[numberCarousel].image;
  prevImage = images[prevNumber].image;
  nextImage = images[nextNumber].image;
  header.setCarousel(mainImage, prevImage, nextImage);
  var activeIndicator = document.querySelectorAll(".activeIndicator");
  activeIndicator[0].className = activeIndicator[0].className.replace(" activeIndicator", "");
  $(indicators[numberCarousel]).addClass(" activeIndicator");
};

header.getNextImage = function () {

  carouselInterval = setInterval(function () {
      numberCarousel++;
      header.getCarouselContent();
  }, 3500);
};

$(document).ready(function () {
  $(".welcome-wrapper__carousel-slider-prev").click(function () {
    numberCarousel--;
    header.getCarouselContent();
  });

  $(".welcome-wrapper__carousel-slider-next").click(function () {
    numberCarousel++;
    header.getCarouselContent();
  });

  $(".welcome-wrapper__indicators-indicator").click(function () {
    var images = header.images;
    var clickedIndicatorId = $(this).attr("id");
    for(i = 0; i < images.length; i++) {
      var carouselImageCountry = header.images[i].id;
      if(clickedIndicatorId.includes(carouselImageCountry)) {
        numberCarousel = i;
        header.getCarouselContent();
      }
    }
  });
});

document.addEventListener('DOMContentLoaded', function() {
  var elems = document.querySelectorAll('.tooltipped');
  var instances = M.Tooltip.init(elems, {
    enterDelay: "200"
  });
});

header.setSentence = function (year, text) {
  var sentenceYear = document.querySelector(
    ".welcome-wrapper__sentence-content-year"
  );
  var sentenceText = document.querySelector(
    ".welcome-wrapper__sentence-content-text"
  );

  sentenceYear.textContent = year;
  sentenceText.textContent = text;
};

header.getSentenceContent = function () {
  var sentences = header.sentences;
  var flags = document.querySelectorAll(".image__flag-64x38");
  var arrYear = sentences[numberCountry].year;
  var arrText = sentences[numberCountry].sentence;
  header.setSentence(arrYear, arrText);
  var activeParent = document.querySelectorAll(".active");
  activeParent[0].className = activeParent[0].className.replace(" active", "");
  $(flags[numberCountry]).parent().addClass(" active");
};

header.getNextSentence = function () {
  var sentences = header.sentences;
  countriesInterval = setInterval(function () {
    header.getSentenceContent();
    numberCountry++;
    if (numberCountry == sentences.length) {
      numberCountry = 0;
    }
  }, 3500);
};

$(document).ready(function () {
  $(".image__flag-64x38").click(function () {
    var sentences = header.sentences;
    var flags = document.querySelectorAll(".image__flag-64x38");
    var clickedCountry = $(this).attr("class");
    for (i = 0; i < flags.length; i++) {
      var sentenceCountry = sentences[i].country;
      if (clickedCountry.includes(sentenceCountry)) {
        numberCountry = i;
        header.getSentenceContent();
        if (numberCountry == sentences.length) {
          numberCountry = 0;
        }
      };
    };
  });
});

//------------------- NAVBAR -------------------

navbarObj.initNavbarView = function () {
  $('[data-function="menu-button"]').unbind('click').click(function (e) {
    navbarObj.toggleMenu();
    e.stopPropagation();
  });

  // ON CLICK NAVBAR ITEM
  $('[data-menu]').unbind('click').click(function (e) {
    navbarObj.showDropdown($(this));
    e.stopPropagation();
  });

  // ON CLICK DROPDOWN ITEM
  $('.dropdown__item').unbind('click').click(function (e) {
    navbarObj.hideCurrentDropdown($(this));
    navbarObj.toggleMenu();
    e.stopPropagation();
  });
}

// Show or hide menu
navbarObj.toggleMenu = function () {
  var $menuList = $('[data-function="menu-list"]');

  if ($menuList.hasClass('navbar__list--show')) {
    $menuList.removeClass('navbar__list--show');
  } else {
    $menuList.addClass('navbar__list--show');
  }
}

// Show dropdown
navbarObj.showDropdown = function($object) {
  var submenu = $object.attr('data-menu');
  var isOpen = undefined;

  if ($object.find('.dropdown__list').hasClass('dropdown__list--show')) {
    isOpen = true;
  } else {
    isOpen = false;
  }

  if (isOpen) {
    $object.find('.dropdown__list').removeClass('dropdown__list--show');
  } else {
    switch (submenu) {
      case "conference-dropdown":
        navbarObj.hideDropdown();
        $('[data-menu="' + submenu + '"]').find('.dropdown__list').addClass('dropdown__list--show');
        break;
      case "participation-dropdown":
        navbarObj.hideDropdown();
        $('[data-menu="' + submenu + '"]').find('.dropdown__list').addClass('dropdown__list--show');
        break;
      case "organizers-dropdown":
        navbarObj.hideDropdown();
        $('[data-menu="' + submenu + '"]').find('.dropdown__list').addClass('dropdown__list--show');
        break;
      case "committees-dropdown":
        navbarObj.hideDropdown();
        $('[data-menu="' + submenu + '"]').find('.dropdown__list').addClass('dropdown__list--show');
        break;
      case "keynote-dropdown":
        navbarObj.hideDropdown();
        $('[data-menu="' + submenu + '"]').find('.dropdown__list').addClass('dropdown__list--show');
        break;
      case "downloads-dropdown":
        navbarObj.hideDropdown();
        $('[data-menu="' + submenu + '"]').find('.dropdown__list').addClass('dropdown__list--show');
        break;
    }
  }
}

// Hide menu dropdowns
navbarObj.hideDropdown = function() {
  var $overview = $('[data-function="navbar"]');

  var list = $overview.find('.dropdown__list');

  $.each(list, function(i, element) {
    $(element).removeClass('dropdown__list--show');
  })
}

navbarObj.hideCurrentDropdown = function($dropItem) {
  $dropItem.parents('.dropdown__list').removeClass('dropdown__list--show');
}

// ------------------- OVERVIEW -------------------

// ------------------- RELEVANT TOPICS -------------------
releventTopics.initReleventTopicView = function () {
  var table = document.querySelector('[data-function="topics-wrapper"]');

  var topicArr = releventTopics.topicArr;
  var index = 0;


  while (index < topicArr.length) {
    var tr = document.createElement('tr');

    for (var i = 1; i < 4; i++) {
      var td = document.createElement('td');
      var cell = document.createTextNode(topicArr[index]);

      if (cell.toString().valueOf() === "undefined") {
        td.appendChild("");
      } else {
        td.appendChild(cell);
      }

      td.appendChild(cell);
      tr.appendChild(td);
      index++;
    }


    table.appendChild(tr);
  }
};
// ------------------- ORGANIZERS -------------------

document.addEventListener('DOMContentLoaded', function () {
  var elems = document.querySelectorAll('.collapsible');
  var instances = M.Collapsible.init(elems);
});




// Long arrays and HTML templates leave at the bottom of the file
header.images = [{
  id: "imagePlais",
  image: "../assets/img/header_carousel/1.png"
},
{
  id: "imageUg",
  image: "../assets/img/header_carousel/2.png"
},
{
  id: "imageErcis",
  image: "../assets/img/header_carousel/3.png"
},
{
  id: "imageGdansk",
  image: "../assets/img/header_carousel/4.jpg"
},
{
  id: "imagePan",
  image: "../assets/img/header_carousel/5.png"
}];

header.sentences = [{
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
  country: "bulgaria",
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
  year: "יובל הזהב 51 שנים (1967 - 2018) של אינפורמטיקה עסקית באוניברסיטת גדנסק, פולין",
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
  sentence: "A SPECIALIZARII INFORMATICA ECONOMICA LA UNIVERSITATEA DIN GDANSK"
},
{
  country: "russia",
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

releventTopics.topicArr = [
  "Agile Methods",
  "Big Data, Business Analytics",
  "Blockchain Technology and Applications",
  "Business Informatics",
  "Business Process Modeling",
  "Case Studies in SAND",
  "Cloud Computing",
  "Cognitive Issues in SAND",
  "Conceptual Modeling",
  "Crowdsourcing and Crowdfunding Models",
  "Design Theory",
  "Digital Services and Social Media",
  "Enterprise Architecture",
  "Enterprise Social Networks",
  "ERP and CRM Systems",
  "Ethical and Human Aspects of IS Development",
  "Ethnographic, Anthropological, Action and Entrepreneurial Research",
  "Evolution of IS Discipline",
  "Human-Computer Interaction",
  "Industry 4.0",
  "Information Systems Development: Methodologies, Methods, Techniques and Tools",
  "Internet of Things",
  "Machine Learning",
  "Model-Driven Architecture",
  "New Paradigms, Formalisms, Approaches, Frameworks and Challenges in IS & SAND",
  "Ontological Foundations and Intelligent Systems of SAND",
  "Open Source Software (OSS) Solutions",
  "Project Management",
  "Quality Assurance in Systems Development",
  "Requirements and Software Engineering",
  "Research Methodologies in SAND",
  "Role of SAND in Mobile and Internet Applications Development",
  "SAND Education: Curricula, E-learning, MOOCs and Teaching Cases",
  "SCRUM Approach",
  "Security and Privacy Issues in IS & SAND",
  "Service Oriented Systems Development",
  "Social Networking Services",
  "Socio-Technical Approaches to System Development, Psychological and Behavioural Descriptions",
  "Software Intensive Systems and Services",
  "Strategic Information Systems in Enterprises",
  "Supply Chain Management Aspects",
  "Systems Analysts and Designers Professions",
  "Teams and Teamwork in IS & SAND",
  "UML, SysML, BPMN",
  "User Experience (UX) Design",
  "Workflow Management"
];
