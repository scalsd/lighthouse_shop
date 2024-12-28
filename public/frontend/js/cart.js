$(document).ready(function() {
    // Обработка клика по кнопке "Добавить в корзину" на странице деталей
    $('.add-to-cart-btn').on('click', function(e) {
        e.preventDefault();
        const form = $(this).closest('form');
        const quantity = parseInt(form.find('.qty-text').val());
        const title = form.find('.product-title').val();
        const price = form.find('.product-price').val();
        const image = form.find('.product-image').val();
        
        // Добавляем товар в корзину нужное количество раз
        addToCart(title, price, image, quantity);
        showMessage('Товар добавлен в корзину');
    });

    // Функция добавления товара
    function addToCart(title, price, image, quantity = 1) {
        const cartList = $('.cart-list');
        
        // Проверяем, есть ли уже такой товар в корзине
        let found = false;
        cartList.find('li').each(function() {
            if ($(this).find('.cart-item-desc a:not(.image)').text() === title) {
                // Увеличиваем количество
                const quantityElement = $(this).find('p');
                const currentQuantity = parseInt(quantityElement.text().split('x')[0]);
                quantityElement.html(`${currentQuantity + quantity}x - <span class="price">₽${price}</span>`);
                found = true;
                return false;
            }
        });
        
        // Если товар не найден, добавляем новый
        if (!found) {
            const newItem = `
                <li>
                    <div class="cart-item-desc">
                        <a href="#" class="image">
                            <img src="${image}" class="cart-thumb" alt="">
                        </a>
                        <div>
                            <a href="#">${title}</a>
                            <p>${quantity}x - <span class="price">₽${price}</span></p>
                        </div>
                    </div>
                    <span class="dropdown-product-remove"><i class="icofont-bin"></i></span>
                </li>
            `;
            cartList.append(newItem);
        }
        
        updateCartTotal();
        updateCartQuantity();
    }

    // Удаление товара
    $(document).on('click', '.dropdown-product-remove', function() {
        $(this).closest('li').remove();
        updateCartTotal();
        updateCartQuantity();
    });

    // Обновление общей суммы
    function updateCartTotal() {
        let total = 0;
        $('.cart-list li').each(function() {
            const price = $(this).find('.price').text().replace('₽', '');
            const quantity = parseInt($(this).find('p').text().split('x')[0]);
            total += parseFloat(price) * quantity;
        });
        $('.cart-total').text('₽' + total);
    }

    // Обновление количества товаров в корзине
    function updateCartQuantity() {
        let quantity = 0;
        $('.cart-list li').each(function() {
            quantity += parseInt($(this).find('p').text().split('x')[0]);
        });
        $('.cart_quantity').text(quantity);
    }

    // Очистка корзины
    function clearCart() {
        $('.cart-list').empty();
        $('.cart-total').text('₽0');
        $('.cart_quantity').text('0');
    }

    // Показ сообщения
    function showMessage(message) {
        const alert = $(`
            <div class="alert alert-success" style="
                position: fixed;
                top: 20px;
                right: 20px;
                z-index: 9999;
                padding: 15px;
                background-color: #dff0d8;
                border: 1px solid #d6e9c6;
                border-radius: 4px;
                color: #3c763d;
            ">
                ${message}
            </div>
        `);
        
        $('body').append(alert);
        
        setTimeout(() => alert.fadeOut('slow', function() {
            $(this).remove();
        }), 3000);
    }
});
