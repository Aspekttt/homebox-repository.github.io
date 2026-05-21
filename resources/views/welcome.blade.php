@extends('layouts.app')
@section('content')
<!-- Hero секция -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="py-[50px] md:py-[80px] lg:py-[125px] flex flex-col lg:flex-row text-center lg:text-left justify-between items-center lg:items-start">
        <div class="left_side mb-10 lg:mb-0">
            <h1 class="text-28px sm:text-34px lg:text-38px pb-6 sm:pb-8 lg:pb-28 w-full lg:w-[600px]">
                <span class="text-32px sm:text-38px lg:text-42px text-[#179BFF]">ХоумБокс</span> - аренда кладовых контейнеров в жилых комплексах.
            </h1>
            <h2 class="text-22px sm:text-26px lg:text-28px text-[#595959] pb-10 sm:pb-16 lg:pb-20 w-full lg:w-[350px]">
                Ваш <span class="text-[#179BFF]">личный склад</span> в двух шагах от дома.
            </h2>
            <div class="buttons flex flex-col sm:flex-row justify-center lg:justify-start gap-4 sm:gap-0">
                <a href="{{ route('about') }}">
                    <button class="px-8 sm:px-10 py-2.5 text-white text-xl sm:text-2xl bg-[#71C2FF] rounded-lg transition duration-150 hover:bg-[#179BFF] w-full sm:w-auto" type="button">
                        О сервисе
                    </button>
                </a>
                <a href="{{ route('containers') }}">
                    <button class="px-10 sm:px-16 py-2.5 text-white text-xl sm:text-2xl bg-[#179BFF] rounded-lg transition duration-150 hover:bg-[#0077FF] w-full sm:w-auto sm:ml-3" type="button">
                        В каталог
                    </button>
                </a>
            </div>
        </div>
        <div class="right_side mt-8 lg:mt-0">
            <img src="{{  asset('img/welcome_img.jpg')  }}" class="hidden sm:block w-full max-w-[500px] lg:max-w-none h-auto rounded-[20px]" alt="Встречающяя картинка">
        </div>
    </div>
</div>

<!-- Преимущества -->
<div class="bg-[#F3F4F6] rounded-[40px] sm:rounded-[60px] lg:rounded-[80px] mx-4 sm:mx-6 lg:mx-0">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="py-[60px] sm:py-[90px] lg:py-[125px] flex flex-col justify-between">
            <h2 class="text-26px sm:text-30px lg:text-32px pb-12 sm:pb-16 lg:pb-20 text-center lg:text-left">Преимущества аренды кладовых</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">
                <div class="flex flex-col border-b border-[#179BFF] pb-4">
                    <div class="flex items-center pb-2">
                        <img src="{{  asset('img/icon-num_1.png')  }}" width="40px" height="40px" class="w-8 h-8 sm:w-10 sm:h-10">
                        <h3 class="text-20px sm:text-24px text-[#179BFF] px-3">Круглосуточный доступ</h3>
                    </div>
                    <p class="text-16px sm:text-18px text-[#595959]">Приходите за вещами в любое время. Никаких графиков работы и очередей — только вы и ваша кладовка.</p>
                </div>

                <div class="flex flex-col border-b border-[#179BFF] pb-4">
                    <div class="flex items-center pb-2">
                        <img src="{{  asset('img/icon-num_2.png')  }}" width="40px" height="40px" class="w-8 h-8 sm:w-10 sm:h-10">
                        <h3 class="text-20px sm:text-24px text-[#179BFF] px-3">Личная безопасность</h3>
                    </div>
                    <p class="text-16px sm:text-18px text-[#595959]">Каждый контейнер запирается на ваш личный замок. Доступ посторонних исключен. Вы единственный владелец ключа.</p>
                </div>

                <div class="flex flex-col border-b border-[#179BFF] pb-4">
                    <div class="flex items-center pb-2">
                        <img src="{{  asset('img/icon-num_3.png')  }}" width="40px" height="40px" class="w-8 h-8 sm:w-10 sm:h-10">
                        <h3 class="text-20px sm:text-24px text-[#179BFF] px-3">Чистота и порядок</h3>
                    </div>
                    <p class="text-16px sm:text-18px text-[#595959]">Регулярная уборка общих зон, сухие и проветриваемые помещения. Ваши вещи не отсыреют и не испортятся.</p>
                </div>

                <div class="flex flex-col border-b border-[#179BFF] pb-4">
                    <div class="flex items-center pb-2">
                        <img src="{{  asset('img/icon-num_4.png')  }}" width="40px" height="40px" class="w-8 h-8 sm:w-10 sm:h-10">
                        <h3 class="text-20px sm:text-24px text-[#179BFF] px-3">Размеры на любой запрос</h3>
                    </div>
                    <p class="text-16px sm:text-18px text-[#595959]">Контейнеры разного объема — от компактных для коробок до просторных для мебели и велосипедов.</p>
                </div>

                <div class="flex flex-col border-b border-[#179BFF] pb-4">
                    <div class="flex items-center pb-2">
                        <img src="{{  asset('img/icon-num_5.png')  }}" width="40px" height="40px" class="w-8 h-8 sm:w-10 sm:h-10">
                        <h3 class="text-20px sm:text-24px text-[#179BFF] px-3">Гибкая аренда</h3>
                    </div>
                    <p class="text-16px sm:text-18px text-[#595959]">Оплата по дням без долгосрочных контрактов. Начали пользоваться — арендуете, перестали — закрываете договор.</p>
                </div>

                <div class="flex flex-col border-b border-[#179BFF] pb-4">
                    <div class="flex items-center pb-2">
                        <img src="{{  asset('img/icon-num_6.png')  }}" width="40px" height="40px" class="w-8 h-8 sm:w-10 sm:h-10">
                        <h3 class="text-20px sm:text-24px text-[#179BFF] px-3">Прозрачные тарифы</h3>
                    </div>
                    <p class="text-16px sm:text-18px text-[#595959]">Фиксированная стоимость за день. Никаких скрытых комиссий, платы за въезд или дополнительных начислений.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- FAQ -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="py-[60px] sm:py-[90px] lg:py-[125px] flex flex-col justify-between">
        <h2 class="text-26px sm:text-30px lg:text-32px pb-12 sm:pb-16 lg:pb-20 text-center lg:text-left">Часто задаваемые вопросы</h2>

        <div class="flex justify-center items-center flex-col">
            <details class="group w-full overflow-hidden mb-6 pb-4 border-b-2 border-black hover:border-[#595959] transition-colors duration-150">
                <summary class="block text-black text-lg sm:text-xl pb-4 cursor-pointer hover:text-[#595959] transition-colors duration-150 font-medium">
                    Могу ли я в любой момент прийти к своей кладовке?
                </summary>
                <p class="text-base sm:text-lg text-[#595959] pb-4">Да, доступ к контейнеру осуществляется круглосуточно 7 дней в неделю. Вы приходите в любое удобное время.</p>
            </details>

            <details class="group w-full overflow-hidden mb-6 pb-4 border-b-2 border-black hover:border-[#595959] transition-colors duration-150">
                <summary class="block text-black text-lg sm:text-xl pb-4 cursor-pointer hover:text-[#595959] transition-colors duration-150 font-medium">
                    Как обеспечивается безопасность?
                </summary>
                <p class="text-base sm:text-lg text-[#595959] pb-4">Каждый контейнер запирается на ваш личный замок. Ключ есть только у вас. Дополнительно помещение, где установлены боксы, находится под видеонаблюдением или в зоне контроля ЖК.</p>
            </details>

            <details class="group w-full overflow-hidden mb-6 pb-4 border-b-2 border-black hover:border-[#595959] transition-colors duration-150">
                <summary class="block text-black text-lg sm:text-xl pb-4 cursor-pointer hover:text-[#595959] transition-colors duration-150 font-medium">
                    Какие вещи можно хранить?
                </summary>
                <p class="text-base sm:text-lg text-[#595959] pb-4">Разрешено хранение любых личных неопасных предметов: сезонная одежда, инструменты, спортивный инвентарь, мебель, шины, коробки. Запрещены легковоспламеняющиеся, взрывчатые вещества и продукты питания.</p>
            </details>

            <details class="group w-full overflow-hidden mb-6 pb-4 border-b-2 border-black hover:border-[#595959] transition-colors duration-150">
                <summary class="block text-black text-lg sm:text-xl pb-4 cursor-pointer hover:text-[#595959] transition-colors duration-150 font-medium">
                    Нужно ли заключать договор?
                </summary>
                <p class="text-base sm:text-lg text-[#595959] pb-4">Да, аренда оформляется официальным договором. Это гарантирует вашу безопасность и закрепляет контейнер за вами.</p>
            </details>

            <details class="group w-full overflow-hidden mb-6 pb-4 border-b-2 border-black hover:border-[#595959] transition-colors duration-150">
                <summary class="block text-black text-lg sm:text-xl pb-4 cursor-pointer hover:text-[#595959] transition-colors duration-150 font-medium">
                    Есть ли плата за въезд или депозит?
                </summary>
                <p class="text-base sm:text-lg text-[#595959] pb-4">Нет, мы работаем без скрытых комиссий. Оплачивается только фиксированная стоимость аренды за день.</p>
            </details>

            <details class="group w-full overflow-hidden mb-6 pb-4 border-b-2 border-black hover:border-[#595959] transition-colors duration-150">
                <summary class="block text-black text-lg sm:text-xl pb-4 cursor-pointer hover:text-[#595959] transition-colors duration-150 font-medium">
                    Может ли кто-то другой получить доступ к моему контейнеру?
                </summary>
                <p class="text-base sm:text-lg text-[#595959] pb-4">Нет. Только вы, как владелец ключа. Вы также можете передать ключ доверенному лицу, но это остается на ваше усмотрение.</p>
            </details>

            <details class="group w-full overflow-hidden mb-6 pb-4 border-b-2 border-black hover:border-[#595959] transition-colors duration-150">
                <summary class="block text-black text-lg sm:text-xl pb-4 cursor-pointer hover:text-[#595959] transition-colors duration-150 font-medium">
                    Поддерживается ли в контейнерах температура?
                </summary>
                <p class="text-base sm:text-lg text-[#595959] pb-4">Контейнеры находятся в отапливаемом/вентилируемом помещении ЖК, что защищает вещи от перепадов температур и сырости.</p>
            </details>
        </div>
    </div>
</div>
@endsection
