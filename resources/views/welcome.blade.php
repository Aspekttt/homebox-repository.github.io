@extends('layouts.app')
    @section('content')
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="py-[125px] flex text-left flex-row justify-between">
                <div class="left_side">
                    <h1 class="text-38px pb-28 w-[600px]"><span class="text-42px text-[#179BFF]">ХоумБокс</span> - аренда кладовых контейнеров в жилых комплексах.</h1>
                    <h2 class="text-28px text-[#595959] pb-20 w-[350px]">Ваш <span class="text-[#179BFF]">личный склад</span> в двух шагах от дома.</h2>
                    <div class="buttons">
                        <a href="{{ route("about") }}"><button class="px-10 py-2.5 text-white text-2xl bg-[#71C2FF] rounded-lg transition duration-150 hover:bg-[#179BFF]" type="button">О сервисе</button></a>
                        <a href="{{ route("containers") }}"><button class="px-16 py-2.5 ml-3 text-white text-2xl bg-[#179BFF] rounded-lg transition duration-150 hover:bg-[#0077FF]" type="button">В каталог</button></a>
                    </div>
                </div>
                <div class="right_side">
                    <img src="/resources/img/welcome_img.jpg" width="!600px" height="!600px" >
                </div>
            </div>
        </div>

        <div class="bg-[#F3F4F6] rounded-[80px]">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="py-[125px] flex text-left flex-col justify-between">
                    <h2 class="text-32px pb-20">Преимущества аренды кладовых</h2>

                    <div class="flex text-left flex-row justify-between flex-wrap">
                        <div class="flex text-left flex-col flex-wrap w-[460px] border-b border-[#179BFF] mb-10">
                            <div class="flex text-left flex-row items-center pb-2">
                                <H><img src="/resources/img/icon-num_1.png" width="40px" height="40px"></H>
                                <h3 class="text-24px text-[#179BFF] px-3">Круглосуточный доступ</h3>
                            </div>
                            <div class="flex text-left flex-row items-center">
                                <p class="text-18px text-[#595959] pb-10">Приходите за вещами в любое время. Никаких графиков работы и очередей — только вы и ваша кладовка.</p>
                            </div>
                        </div>

                        <div class="flex text-left flex-col flex-wrap w-[460px] border-b border-[#179BFF] mb-10">
                            <div class="flex text-left flex-row items-center pb-2">
                                <H><img src="/resources/img/icon-num_2.png" width="40px" height="40px"></H>
                                <h3 class="text-24px text-[#179BFF] px-3">Личная безопасность</h3>
                            </div>
                            <div class="flex text-left flex-row items-center">
                                <p class="text-18px text-[#595959] pb-10">Каждый контейнер запирается на ваш личный замок. Доступ посторонних исключен. Вы единственный владелец ключа.</p>
                            </div>
                        </div>

                        <div class="flex text-left flex-col flex-wrap w-[460px] border-b border-[#179BFF] mb-10">
                            <div class="flex text-left flex-row items-center pb-2">
                                <H><img src="/resources/img/icon-num_3.png" width="40px" height="40px"></H>
                                <h3 class="text-24px text-[#179BFF] px-3">Чистота и порядок</h3>
                            </div>
                            <div class="flex text-left flex-row items-center">
                                <p class="text-18px text-[#595959] pb-10">Регулярная уборка общих зон, сухие и проветриваемые помещения. Ваши вещи не отсыреют и не испортятся.</p>
                            </div>
                        </div>

                        <div class="flex text-left flex-col flex-wrap w-[460px] border-b border-[#179BFF] mb-10">
                            <div class="flex text-left flex-row items-center pb-2">
                                <H><img src="/resources/img/icon-num_4.png" width="40px" height="40px"></H>
                                <h3 class="text-24px text-[#179BFF] px-3">Размеры на любой запрос</h3>
                            </div>
                            <div class="flex text-left flex-row items-center">
                                <p class="text-18px text-[#595959] pb-10">Контейнеры разного объема — от компактных для коробок до просторных для мебели и велосипедов. Подберете под свои нужды.</p>
                            </div>
                        </div>

                        <div class="flex text-left flex-col flex-wrap w-[460px] border-b border-[#179BFF] mb-10">
                            <div class="flex text-left flex-row items-center pb-2">
                                <H><img src="/resources/img/icon-num_5.png" width="40px" height="40px"></H>
                                <h3 class="text-24px text-[#179BFF] px-3">Гибкая аренда</h3>
                            </div>
                            <div class="flex text-left flex-row items-center">
                                <p class="text-18px text-[#595959] pb-10">Оплата по дням без долгосрочных контрактов. Начали пользоваться — арендуете, перестали — закрываете договор.</p>
                            </div>
                        </div>

                        <div class="flex text-left flex-col flex-wrap w-[460px] border-b border-[#179BFF] mb-10">
                            <div class="flex text-left flex-row items-center pb-2">
                                <H><img src="/resources/img/icon-num_6.png" width="40px" height="40px"></H>
                                <h3 class="text-24px text-[#179BFF] px-3">Прозрачные тарифы</h3>
                            </div>
                            <div class="flex text-left flex-row items-center">
                                <p class="text-18px text-[#595959] pb-10">Фиксированная стоимость за день. Никаких скрытых комиссий, платы за въезд или дополнительных начислений.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="py-[125px] flex text-left flex-col justify-between">
                <h2 class="text-32px pb-20">Часто задаваемые вопросы</h2>
                <div class="flex justify-center items-center flex-col">
                    <details open class="block w-full overflow-hidden mb-[30px] pb-[15px] border-b-2 border-black hover:border-b-2 hover:border-[#595959] transition-colors duration-150">
                        <summary class="block text-black text-xl pb-[20px] cursor-pointer hover:text-[#595959] transition-colors duration-150 summary">Могу ли я в любой момент прийти к своей кладовке?</summary>
                        <p class="text-lg text-[#595959] animate-sweep">Да, доступ к контейнеру осуществляется круглосуточно 7 дней в неделю. Вы приходите в любое удобное время.</p>
                    </details>
                    <details open class="block w-full overflow-hidden mb-[30px] pb-[15px] border-b-2 border-black hover:border-b-2 hover:border-[#595959] transition-colors duration-150">
                        <summary class="block text-black text-xl pb-[20px] cursor-pointer hover:text-[#595959] transition-colors duration-150 summary">Как обеспечивается безопасность?</summary>
                        <p class="text-lg text-[#595959] animate-sweep">Каждый контейнер запирается на ваш личный замок. Ключ есть только у вас. Дополнительно помещение, где установлены боксы, находится под видеонаблюдением или в зоне контроля ЖК.</p>
                    </details>
                    <details open class="block w-full overflow-hidden mb-[30px] pb-[15px] border-b-2 border-black hover:border-b-2 hover:border-[#595959] transition-colors duration-150">
                        <summary class="block text-black text-xl pb-[20px] cursor-pointer hover:text-[#595959] transition-colors duration-150 summary">Какие вещи можно хранить?</summary>
                        <p class="text-lg text-[#595959] animate-sweep">Разрешено хранение любых личных неопасных предметов: сезонная одежда, инструменты, спортивный инвентарь, мебель, шины, коробки. Запрещены легковоспламеняющиеся, взрывчатые вещества и продукты питания.</p>
                    </details>
                    <details open class="block w-full overflow-hidden mb-[30px] pb-[15px] border-b-2 border-black hover:border-b-2 hover:border-[#595959] transition-colors duration-150">
                        <summary class="block text-black text-xl pb-[20px] cursor-pointer hover:text-[#595959] transition-colors duration-150 summary">Нужно ли заключать договор?</summary>
                        <p class="text-lg text-[#595959] animate-sweep">Да, аренда оформляется официальным договором. Это гарантирует вашу безопасность и закрепляет контейнер за вами.</p>
                    </details>
                    <details open class="block w-full overflow-hidden mb-[30px] pb-[15px] border-b-2 border-black hover:border-b-2 hover:border-[#595959] transition-colors duration-150">
                        <summary class="block text-black text-xl pb-[20px] cursor-pointer hover:text-[#595959] transition-colors duration-150 summary">Есть ли плата за въезд или депозит?</summary>
                        <p class="text-lg text-[#595959] animate-sweep">Нет, мы работаем без скрытых комиссий. Оплачивается только фиксированная стоимость аренды за месяц.</p>
                    </details>
                    <details open class="block w-full overflow-hidden mb-[30px] pb-[15px] border-b-2 border-black hover:border-b-2 hover:border-[#595959] transition-colors duration-150">
                        <summary class="block text-black text-xl pb-[20px] cursor-pointer hover:text-[#595959] transition-colors duration-150 summary">Может ли кто-то другой получить доступ к моему контейнеру?</summary>
                        <p class="text-lg text-[#595959] animate-sweep">Нет. Только вы, как владелец ключа. Вы также можете передать ключ доверенному лицу, но это остается на ваше усмотрение.</p>
                    </details>
                    <details open class="block w-full overflow-hidden mb-[30px] pb-[15px] border-b-2 border-black hover:border-b-2 hover:border-[#595959] transition-colors duration-150">
                        <summary class="block text-black text-xl pb-[20px] cursor-pointer hover:text-[#595959] transition-colors duration-150 summary">Поддерживается ли в контейнерах температура?</summary>
                        <p class="text-lg text-[#595959] animate-sweep">Контейнеры находятся в отапливаемом/вентилируемом помещении ЖК, что защищает вещи от перепадов температур и сырости.</p>
                    </details>
                </div>
            </div>
        </div>

    @endsection
