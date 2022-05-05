
//var products; //коллекция элементов должна уже существовать
//var path_prefix; //префикс каталога часть пути до каталога 2 часть в базе 
///////////////////////////////////
//var cur_block_index; // позиция текущего элемента тоже в скрипте view
var fitr_continue; // контролируемый блок при появлении которого начинается новая прорисовка
var box; // 'элемент ul к которому добавляем'
var catalog_lenght; // длина колекции элементов

document.addEventListener('DOMContentLoaded', InitShowBox);

function InitShowBox() {
    fitr_continue = document.querySelector('.continue_catalog');

    if(fitr_continue){
        box = document.querySelector('.Product_elements');
        catalog_lenght = products.length;
        if(catalog_lenght < 40){
            fitr_continue.classList.add('hidden');
        }
        window.onscroll = isVisibleContinueCatalog;
    }
}



function isVisibleContinueCatalog() { // запустит show_box()
    if (fitr_continue) {
        var coords = fitr_continue.getBoundingClientRect();
        var windowHeight = document.documentElement.clientHeight;
        // верхний край элемента виден?
        var topVisible = coords.top > 0 && coords.top < windowHeight;
        // нижний край элемента виден?
        var bottomVisible = coords.bottom < windowHeight && coords.bottom > 0;
        if (topVisible || bottomVisible) {
            show_box();
        }
    }
}

function show_box() { //нарисует следующие 40 элементов
    var count = 0;
    for (var i = cur_block_index; count < 40; i++) {
        if (i === catalog_lenght - 1) {
            fitr_continue.classList.add('hidden');
        }
        else if (i === catalog_lenght) {
            return;
        }

        count++;
        var li = document.createElement("LI");
        li.classList.add('Product_element');
        var link = document.createElement("A");
        link.classList.add("m-auto", "Product-block", "transition");
        link.dataset.id = products[i].id;
        link.href = prefix_url + '/' + products[i].id;
        var catalog__box = document.createElement("DIV");
        catalog__box.classList.add('box-image');
        if(products[i].img){
            catalog__box.style.cssText = 'background-image:url(' + prefix_img + '/' + products[i].img + ')';
        }
        link.append(catalog__box);
        li.append(link);
        var text__box = document.createElement("DIV");
        text__box.classList.add('text__box');
        var small = document.createElement("SMALL");
        small.innerText = 'арт:';
        var span = document.createElement("SPAN");
        span.innerText = products[i].articul;
        text__box.append(small);
        text__box.append(span);
        li.append(text__box);
        box.append(li);
        cur_block_index++;
    }
}