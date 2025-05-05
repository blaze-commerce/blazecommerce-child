jQuery(document).ready(function ($) {
  console.log("script.js is loaded and running!");

  if (window.location.pathname === '/stock-show-u/') {
    var $accordionContainer = $('.blz-close-accordion');
    if ($accordionContainer.length) {

      $accordionContainer.find('.gb-accordion__item-open').each(function () {
        var $openedItem = $(this);
        $openedItem.removeClass('gb-accordion__item-open');
        var $button = $openedItem.find('.blz-accordion-button');
        if ($button.length) {
          $button.removeClass('gb-block-is-current');
        }
      });

    }

    function processAccordionButton($button) {
      var $siblingX = $button.next(); // "sibling x"
      if ($siblingX.length) {
        // Find its child element with class .blz-accordion-content-style
        var $contentChild = $siblingX.find('.blz-accordion-content-style');
        if ($contentChild.length) {
          $contentChild.addClass('blz-current-accordion-style');
        }
      }
    }

    // Process any buttons already having gb-block-is-current on page load.
    $('.blz-accordion-button.gb-block-is-current').each(function () {
      processAccordionButton($(this));
    });

    // Set up a MutationObserver on each .blz-accordion-button to detect class changes.
    $('.blz-accordion-button').each(function () {
      var buttonNode = this;

      // Create an observer for the current button.
      var observer = new MutationObserver(function (mutationsList, observer) {
        mutationsList.forEach(function (mutation) {
          if (mutation.type === 'attributes' && mutation.attributeName === 'class') {
            var $btn = $(mutation.target);
            // If gb-block-is-current is now present, process this button.
            if ($btn.hasClass('gb-block-is-current')) {
              processAccordionButton($btn);
            }
          }
        });
      });

      // Start observing for attribute changes (specifically the class) on this button.
      observer.observe(buttonNode, {
        attributes: true,
        attributeFilter: ['class']
      });
    });


    $('.blz-stock-u').addClass('blz-active-url');
    $('.blz-stock-u-online').removeClass('blz-active-url');
    $('.blz-clinic-menu').removeClass('blz-active-url');
    $('.blz-res-menu').removeClass('blz-active-url');
    $('.blz-educ-menu').removeClass('blz-active-url');
  }
  if (window.location.pathname === '/stock-show-u/online/') {
    $('.blz-stock-u-online').addClass('blz-active-url');
    $('.blz-stock-u').removeClass('blz-active-url');
    $('.blz-clinic-menu').removeClass('blz-active-url');
    $('.blz-res-menu').removeClass('blz-active-url');
    $('.blz-educ-menu').removeClass('blz-active-url');
  }
  if (window.location.pathname === '/stock-show-u/host-a-clinic/') {
    $('.blz-clinic-menu').addClass('blz-active-url');
    $('.blz-stock-u').removeClass('blz-active-url');
    $('.blz-stock-u-online').removeClass('blz-active-url');
    $('.blz-res-menu').removeClass('blz-active-url');
    $('.blz-educ-menu').removeClass('blz-active-url');
  }
  if (window.location.pathname === '/stock-show-u/resources/') {
    $('.blz-res-menu').addClass('blz-active-url');
    $('.blz-clinic-menu').removeClass('blz-active-url');
    $('.blz-stock-u').removeClass('blz-active-url');
    $('.blz-stock-u-online').removeClass('blz-active-url');
    $('.blz-educ-menu').removeClass('blz-active-url');
  }
  if (window.location.pathname.includes('/category/')) {
    const educMenu = $('.blz-educ-menu');

    // Check if the element exists
    if (educMenu.length) {
      educMenu.addClass('blz-active-url');
      $('.blz-clinic-menu').removeClass('blz-active-url');
      $('.blz-stock-u').removeClass('blz-active-url');
      $('.blz-stock-u-online').removeClass('blz-active-url');
      $('.blz-res-menu').removeClass('blz-active-url');
    }
  }
  // Function that initializes or destroys the slider based on window width.
  function initSlick() {
    // Check if the window width is less than 1024px.
    if ($(window).width() <= 1024) {
      // If the slider isn't already initialized, then initialize it.
      if (!$('.blz-show-online-grid').hasClass('slick-initialized')) {
        $('.blz-show-online-grid').slick({
          slidesToShow: 3,       // adjust number of slides as needed
          slidesToScroll: 1,
          infinite: false,
          dots: true,
          responsive: [
            {
              breakpoint: 768,
              settings: { slidesToShow: 2 }
            },
            {
              breakpoint: 480,
              settings: { slidesToShow: 1 }
            }
          ]
          // You can add additional settings here.
        });
        console.log("Slick slider initialized (below 1024).");
      }
    } else {
      // If window width is 1024px or greater and the slider is initialized, unslick it.
      if ($('.blz-show-online-grid').hasClass('slick-initialized')) {
        $('.blz-show-online-grid').slick('unslick');
        console.log("Slick slider unslicked (1024 and above).");
      }
    }
  }

  // Initialize the slider on page load.
  initSlick();

  // Reinitialize (or unslick) the slider on window resize.
  $(window).on('resize', function () {
    initSlick();
  });

  // Add active class and show first tab content on page load
  var firstTab = $('.tabs .blaze-scholar').children().first();
  firstTab.addClass('active');

  // Get href of first tab and show its content
  var firstTabAttrValue = firstTab.find('a').attr('href');
  $('.tabs ' + firstTabAttrValue).css("display", "grid").fadeIn(400).siblings().hide();

  // Handle tab clicks
  $('.tabs .tab-links a').on('click', function (e) {
    e.preventDefault();

    var currentAttrValue = $(this).attr('href');

    // Show/Hide Tabs
    $('.tabs ' + currentAttrValue)
      .css("display", "grid")
      .fadeIn(400)
      .siblings()
      .hide();

    // Change/remove current tab to active
    $(this).parent('li')
      .addClass('active')
      .siblings()
      .removeClass('active');
  });

  // Set your character limit
  const charLimit = 50;

  $('.blz-scholar-p').each(function () {
    // Find all p elements in this scholar div
    const $paragraphs = $(this).find('p');

    // Track which paragraph has the longest text
    let longestP = null;
    let maxLength = 0;

    // Check each paragraph
    $paragraphs.each(function () {
      const textLength = $(this).text().length;
      console.log('Paragraph text:', $(this).text(), 'Length:', textLength); // Debug log

      if (textLength > maxLength) {
        maxLength = textLength;
        longestP = $(this);
      }
    });

    // Only add "Read More" if the longest paragraph exceeds the limit
    if (longestP && maxLength > charLimit) {
      const text = longestP.text();
      const shortText = text.substring(0, charLimit) + '...';
      const fullText = text;

      // Replace original text with shortened version and add "Read More" button
      longestP.html(
        `<span class="short-text">${shortText}</span>
                <span class="full-text" style="display: none;">${fullText}</span>
                <a href="#" class="excerpt-read-more">Read More</a>`
      );
    }
  });

  // Handle "Read More" click
  $(document).on('click', '.excerpt-read-more', function (e) {
    e.preventDefault();
    const $this = $(this);
    const $shortText = $this.siblings('.short-text');
    const $fullText = $this.siblings('.full-text');

    if ($shortText.is(':visible')) {
      $shortText.hide();
      $fullText.show();
      $this.text('Read Less');
    } else {
      $shortText.show();
      $fullText.hide();
      $this.text('Read More');
    }
  });



  const $megaMenu = $('#mega-menu-max_mega_menu_1');
  const $extendedMenu = $('.bc-extended-menu');

  if ($extendedMenu.length && $megaMenu.length) {
    $megaMenu.append('<li class="border-b mx-3 border-border -mt-[3px]"></li><li class="bc-extended-mega-menu">' + $extendedMenu.html() + '</li>');
    $megaMenu.prepend('<li class="bc-mega-menu-title">Menu</li>');
  }

  $(".select-cat-species").click(function () {
    $(".species-category").toggleClass("hidden");
  });

  var headerElement = $('body.woocommerce-order-received > div.wp-site-blocks > header');

  var customElement = $('#blz-custom-wcorder');

  if (headerElement.length && customElement.length) {
      customElement.insertAfter(headerElement);
  }

});