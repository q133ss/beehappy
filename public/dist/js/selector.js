// главная
//
// $(function() {
//     $('#indexCity').css('display', 'none')
//     $('#indexCity').after('<div class="index__city-select-item"><div class="index__city-select-placeholder">Выберите город</div><div id="indexCityElement" class="index__city-select-wrapper display-n"></div></div>')
//     let count = $('#indexCity').children('option').length
//     for( let i = 0; i < count; i++) {
//         let arrows = $('#indexCity').children('option').eq(i).val()
//         let newElementBlock = document.createElement("button");
//         newElementBlock.classList.add("index__city-select-element")
//         newElementBlock.id = `index__city-select-element-${i}`;
//         newElementBlock.innerHTML = `${arrows}`
//         document.getElementById("indexCityElement").appendChild(newElementBlock);
//         $(`#index__city-select-element-${i}`).attr('value', `${arrows}`)
//     }
//     $('#index__city-select-element-0').css('display', 'none')
//     $('.index__city-select-item').on('click', function() {
//         $('.index__city-select-wrapper').toggleClass('display-n')
//     })
//     $(".index__city-select-element").on('click', function() {
//         let idElement = this.id
//         let valueElement = $(`#${idElement}`).val()
//         $('.index__city-select-placeholder').html(valueElement)
//         $('#indexCity option:nth-child(1)').val(valueElement)
//         $('#indexCity option:nth-child(1)').html(valueElement)
//     })
// })
//
//
// // header menu
//
//
//
// $(function() {
//     $('#headerCity').css('display', 'none')
//     $('#headerCity').after('<div class="header__city-select-item"><div class="header__city-select-placeholder">Выберите город</div><div id="headerCityElement" class="header__city-select-wrapper display-n"></div></div>')
//     let count = $('#headerCity').children('option').length
//     for( let i = 0; i < count; i++) {
//         let arrows = $('#headerCity').children('option').eq(i).val()
//         let newElementBlock = document.createElement("button");
//         newElementBlock.classList.add("header__city-select-element")
//         newElementBlock.id = `header__city-select-element-${i}`;
//         newElementBlock.innerHTML = `${arrows}`
//         document.getElementById("headerCityElement").appendChild(newElementBlock);
//         $(`#header__city-select-element-${i}`).attr('value', `${arrows}`)
//     }
//     $('#header__city-select-element-0').css('display', 'none')
//     $('.header__city-select-item').on('click', function() {
//         $(this).toggleClass('header__city-select-item-active')
//         $('.header__city-select-wrapper').toggleClass('display-n')
//     })
//     $(".header__city-select-element").on('click', function() {
//         let idElement = this.id
//         let valueElement = $(`#${idElement}`).val()
//         $('.header__city-select-placeholder').html(valueElement)
//         $('#headerCity option:nth-child(1)').val(valueElement)
//         $('#headerCity option:nth-child(1)').html(valueElement)
//     })
// })
//
//
//
// // header menu media
//
//
//
// $(function() {
//     $('#mediaHeaderCity').css('display', 'none')
//     $('#mediaHeaderCity').after('<div class="media__city-select-item"><div class="media__city-select-placeholder">Выберите город</div><div id="mediaHeaderCityElement" class="media__city-select-wrapper display-n"></div></div>')
//     let count = $('#mediaHeaderCity').children('option').length
//     for( let i = 0; i < count; i++) {
//         let arrows = $('#mediaHeaderCity').children('option').eq(i).val()
//         let newElementBlock = document.createElement("button");
//         newElementBlock.classList.add("media__city-select-element")
//         newElementBlock.id = `media__city-select-element-${i}`;
//         newElementBlock.innerHTML = `${arrows}`
//         document.getElementById("mediaHeaderCityElement").appendChild(newElementBlock);
//         $(`#media__city-select-element-${i}`).attr('value', `${arrows}`)
//     }
//     $('#media__city-select-element-0').css('display', 'none')
//     $('.media__city-select-item').on('click', function() {
//         $(this).toggleClass('media__city-select-item-active')
//         $('.media__city-select-wrapper').toggleClass('display-n')
//     })
//     $(".media__city-select-element").on('click', function() {
//         let idElement = this.id
//         let valueElement = $(`#${idElement}`).val()
//         $('.media__city-select-placeholder').html(valueElement)
//         $('#mediaHeaderCity option:nth-child(1)').val(valueElement)
//         $('#mediaHeaderCity option:nth-child(1)').html(valueElement)
//     })
// })
//
//
// // header catalog
//
//
// $(function() {
//     $('#headerCatalog').css('display', 'none')
//     $('#headerCatalog').after('<div class="header__catalog-select-item"><div class="header__catalog-select-placeholder">Подборки</div><div id="headerCatalogElement" class="header__catalog-select-wrapper display-n"></div></div>')
//     let count = $('#headerCatalog').children('option').length
//     for( let i = 0; i < count; i++) {
//         let arrows = $('#headerCatalog').children('option').eq(i).val()
//         let newElementBlock = document.createElement("button");
//         newElementBlock.classList.add("header__catalog-select-element")
//         newElementBlock.id = `header__catalog-select-element-${i}`;
//         newElementBlock.innerHTML = `${arrows}`
//         document.getElementById("headerCatalogElement").appendChild(newElementBlock);
//         $(`#header__catalog-select-element-${i}`).attr('value', `${arrows}`)
//     }
//     $('#header__catalog-select-element-0').css('display', 'none')
//     $('.header__catalog-select-item').on('click', function() {
//         $(this).toggleClass('header__catalog-select-item-active')
//         $('.header__catalog-select-wrapper').toggleClass('display-n')
//     })
//     $(".header__catalog-select-element").on('click', function() {
//         let idElement = this.id
//         let valueElement = $(`#${idElement}`).val()
//         $('.header__catalog-select-placeholder').html(valueElement)
//         $('#headerCatalog option:nth-child(1)').val(valueElement)
//         $('#headerCatalog option:nth-child(1)').html(valueElement)
//     })
// })
//
//
// // header menu media catalog
//
//
//
// $(function() {
//     $('#mediaHeaderCatalog').css('display', 'none')
//     $('#mediaHeaderCatalog').after('<div class="media__catalog-select-item"><div class="media__catalog-select-placeholder">Подборки</div><div id="mediaHeaderCatalogElement" class="media__catalog-select-wrapper display-n"></div></div>')
//     let count = $('#mediaHeaderCatalog').children('option').length
//     for( let i = 0; i < count; i++) {
//         let arrows = $('#mediaHeaderCatalog').children('option').eq(i).val()
//         let newElementBlock = document.createElement("button");
//         newElementBlock.classList.add("media__catalog-select-element")
//         newElementBlock.id = `media__catalog-select-element-${i}`;
//         newElementBlock.innerHTML = `${arrows}`
//         document.getElementById("mediaHeaderCatalogElement").appendChild(newElementBlock);
//         $(`#media__catalog-select-element-${i}`).attr('value', `${arrows}`)
//     }
//     $('#media__catalog-select-element-0').css('display', 'none')
//     $('.media__catalog-select-item').on('click', function() {
//         $(this).toggleClass('media__catalog-select-item-active')
//         $('.media__catalog-select-wrapper').toggleClass('display-n')
//     })
//     $(".media__catalog-select-element").on('click', function() {
//         let idElement = this.id
//         let valueElement = $(`#${idElement}`).val()
//         $('.media__catalog-select-placeholder').html(valueElement)
//         $('#mediaHeaderCatalog option:nth-child(1)').val(valueElement)
//         $('#mediaHeaderCatalog option:nth-child(1)').html(valueElement)
//     })
// })
//
//
//
// // order city
//
//
//
// $(function() {
//     $('#orderCity').css('display', 'none')
//     $('#orderCity').after('<div class="order__city-select-item"><div class="order__city-select-placeholder">Выберите город</div><div id="orderCityElement" class="order__city-select-wrapper display-n"></div></div>')
//     let count = $('#orderCity').children('option').length
//     for( let i = 0; i < count; i++) {
//         let arrows = $('#orderCity').children('option').eq(i).val()
//         let newElementBlock = document.createElement("button");
//         newElementBlock.classList.add("order__city-select-element")
//         newElementBlock.id = `order__city-select-element-${i}`;
//         newElementBlock.innerHTML = `${arrows}`
//         document.getElementById("orderCityElement").appendChild(newElementBlock);
//         $(`#order__city-select-element-${i}`).attr('value', `${arrows}`)
//     }
//     $('#order__city-select-element-0').css('display', 'none')
//     $('.order__city-select-item').on('click', function() {
//         $('.order__city-select-wrapper').toggleClass('display-n')
//     })
//     $(".order__city-select-element").on('click', function() {
//         let idElement = this.id
//         let valueElement = $(`#${idElement}`).val()
//         $('.order__city-select-placeholder').css('opacity', '1')
//         $('.order__city-select-placeholder').html(valueElement)
//         $('#orderCity option:nth-child(1)').val(valueElement)
//         $('#orderCity option:nth-child(1)').html(valueElement)
//     })
// })
//
//
// // sub city
//
//
//
// $(function() {
//     $('#subCity').css('display', 'none')
//     $('#subCity').after('<div class="sub__city-select-item"><div class="sub__city-select-placeholder">Выберите город</div><div id="subCityElement" class="sub__city-select-wrapper display-n"></div></div>')
//     let count = $('#subCity').children('option').length
//     for( let i = 0; i < count; i++) {
//         let arrows = $('#subCity').children('option').eq(i).val()
//         let newElementBlock = document.createElement("button");
//         newElementBlock.classList.add("sub__city-select-element")
//         newElementBlock.id = `sub__city-select-element-${i}`;
//         newElementBlock.innerHTML = `${arrows}`
//         document.getElementById("subCityElement").appendChild(newElementBlock);
//         $(`#sub__city-select-element-${i}`).attr('value', `${arrows}`)
//     }
//     $('#sub__city-select-element-0').css('display', 'none')
//     $('.sub__city-select-item').on('click', function() {
//         $('.sub__city-select-wrapper').toggleClass('display-n')
//     })
//     $(".sub__city-select-element").on('click', function() {
//         let idElement = this.id
//         let valueElement = $(`#${idElement}`).val()
//         $('.sub__city-select-placeholder').css('opacity', '1')
//         $('.sub__city-select-placeholder').html(valueElement)
//         $('#subCity option:nth-child(1)').val(valueElement)
//         $('#subCity option:nth-child(1)').html(valueElement)
//     })
// })
//
//
//
// // quiz city
//
//
//
// $(function() {
//     $('#quizCity').css('display', 'none')
//     $('#quizCity').after('<div class="quiz__city-select-item"><div class="quiz__city-select-placeholder">Выберите город</div><div id="quizCityElement" class="quiz__city-select-wrapper display-n"></div></div>')
//     let count = $('#quizCity').children('option').length
//     for( let i = 0; i < count; i++) {
//         let arrows = $('#quizCity').children('option').eq(i).val()
//         let newElementBlock = document.createElement("button");
//         newElementBlock.classList.add("quiz__city-select-element")
//         newElementBlock.id = `quiz__city-select-element-${i}`;
//         newElementBlock.innerHTML = `${arrows}`
//         document.getElementById("quizCityElement").appendChild(newElementBlock);
//         $(`#quiz__city-select-element-${i}`).attr('value', `${arrows}`)
//     }
//     $('#quiz__city-select-element-0').css('display', 'none')
//     $('.quiz__city-select-item').on('click', function() {
//         $(this).toggleClass('quiz__city-select-item-active')
//         $('.quiz__city-select-wrapper').toggleClass('display-n')
//     })
//     $(".quiz__city-select-element").on('click', function() {
//         let idElement = this.id
//         let valueElement = $(`#${idElement}`).val()
//         $('.quiz__city-select-placeholder').css('opacity', '1')
//         $('.quiz__city-select-placeholder').html(valueElement)
//         $('#quizCity option:nth-child(1)').val(valueElement)
//         $('#quizCity option:nth-child(1)').html(valueElement)
//     })
// })
