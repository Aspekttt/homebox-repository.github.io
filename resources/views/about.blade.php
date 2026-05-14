@extends('layouts.app')
    @section('content')
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center pt-[80px]">
            <h2 class="text-32px"><span class="text-[#179BFF]">Self-storage</span> — это ваша личная мини-<br>кладовка в ЖК, доступная 24/7.</h2>
            <h3 class="text-20px pt-[80px]">Вы арендуете сухой, чистый и охраняемый контейнер нужного<br> размера. Загружаете вещи раз в сезон или пользуетесь ежедневно —<br> без посредников и переплат за лишние метры.</h3>
            <div class="flex text-center flex-row flex-wrap justify-between items-center pt-[80px]">
                <div class="flex text-center flex-col items-center">
                    <img src="/resources/img/icon key.svg" width="70px">
                    <h4 class="text-18px pt-[20px]">Вы устанавливаете свой замок.<br> Ключ только у вас — никто не<br> получит доступ без вашего<br>ведома.</h4>
                </div>
                <div class="flex text-center flex-col items-center">
                    <img src="/resources/img/icon time.png" width="70px">
                    <h4 class="text-18px pt-[20px]">Приходите в любое время —<br> днем, ночью, в выходные.<br> Контейнер всегда ждет вас.</h4>
                </div>
                <div class="flex text-center flex-col items-center">
                    <img src="/resources/img/icon security.svg" width="60px">
                    <h4 class="text-18px pt-[20px]">Помещение под<br> видеонаблюдением и в зоне<br> контроля ЖК. Ваши вещи под<br> надежной защитой.</h4>
                </div>
            </div>
        </div>
        <div class="bg-[#F3F4F6] rounded-[80px] mt-[80px]">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center py-[70px]">
                <h2 class="text-32px">Аренда<span class="text-[#179BFF]"> за 5 минут</span>. Без визита в офис</h2>
                <h3 class="text-20px pt-[80px]">Вы выбрали контейнер на плане — через 5 минут он ваш.<br> Вот пошаговая инструкция</h3>
                <div class="flex text-center flex-row flex-wrap justify-between items-stretch py-[60px]">
                    <div class="bg-white rounded-[30px] p-[20px] py-[40px] border border-[#71C2FF]/70 shadow-[5px_5px_15px_-5px_#71C2FF] transition duration-150 hover:border-[#179BFF]/80 hover:shadow-[7px_7px_25px_-5px_#71C2FF]">
                        <h5 class="text-24px pb-[30px]">Выберите<br> контейнер</h5>
                        <p class="text-20px text-[#595959] pb-[30px]">Не знаете, какой<br> нужен? Фильтры<br> подскажут по вашим<br> критериям.</p>
                        <img src="/resources/img/chose_container.jpg" width="230px">
                    </div>
                    <div class="bg-white rounded-[30px] p-[20px] py-[40px] border border-[#71C2FF]/70 shadow-[5px_5px_15px_-5px_#71C2FF] transition duration-150 hover:border-[#179BFF]/80 hover:shadow-[7px_7px_25px_-5px_#71C2FF]">
                        <h5 class="text-24px pb-[30px]">Забронируйте<br> контейнер</h5>
                        <p class="text-20px text-[#595959] pb-[30px]">Нажмите кнопку — и<br> выдохните. Контейнер<br> уже ждёт.</p>
                        <img src="/resources/img/booking.jpg" width="230px">
                    </div>
                    <div class="bg-white rounded-[30px] p-[20px] py-[40px] border border-[#71C2FF]/70 shadow-[5px_5px_15px_-5px_#71C2FF] transition duration-150 hover:border-[#179BFF]/80 hover:shadow-[7px_7px_25px_-5px_#71C2FF]">
                        <h5 class="text-24px pb-[30px]">Заключите<br> договор</h5>
                        <p class="text-20px text-[#595959] pb-[5px]">В договоре всего 2<br> страницы. Без<br> мелкого шрифта и<br> подвохов.</p>
                        <img src="/resources/img/agreement.jpg" width="230px">
                    </div>
                    <div class="bg-white rounded-[30px] p-[20px] py-[40px] border border-[#71C2FF]/70 shadow-[5px_5px_15px_-5px_#71C2FF] transition duration-150 hover:border-[#179BFF]/80 hover:shadow-[7px_7px_25px_-5px_#71C2FF]">
                        <h5 class="text-24px pb-[30px]">Получите<br> доступ</h5>
                        <p class="text-20px text-[#595959] pb-[50px]">Ключи только у вас.<br> Даже мы не можем<br> зайти без вашего<br> разрешения.</p>
                        <img src="/resources/img/access.jpg" width="230px">
                    </div>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center pt-[100px]">
            <h2 class="text-32px"><span class="text-[#179BFF]">Преимущества</span> аренды кладовых.</h2>
            <h3 class="text-20px pt-[80px]">Вещи больше не путаются под ногами. Вы не платите за лишние<br> метры в квартире. Идеальный порядок без компромиссов.</h3>
            <div class="flex text-left flex-row justify-between flex-wrap pt-[100px]">
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

        <div class="bg-[#F3F4F6] rounded-[80px] mt-[80px]">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center py-[70px]">
                <h2 class="text-32px"><span class="text-[#179BFF]">Правила</span> пользования — просто о важном</h2>
                <h3 class="text-20px pt-[80px]">Честные правила, которые работают для всех</h3>
                <div class="py-[100px]">
                    <table class="border-[1px] border-[#179BFF]">
                        <thead class="">
                            <tr class="flex flex-row">
                                <th class="p-[25px] border-[1px] border-[#179BFF] flex flex-row items-center justify-between w-full">
                                    <h6 class="text-22px text-[#179BFF]">Можно хранить</h6>
                                    <img src="/resources/img/icons-success.svg" width="40px">
                                </th>
                                <th class="p-[25px] border-[1px] border-[#179BFF] flex flex-row items-center justify-between w-full">
                                    <h6 class="text-22px text-[#179BFF]">Нельзя хранить</h6>
                                    <img src="/resources/img/icons-none.svg" width="40px">
                                </th>
                                <th class="p-[25px] border-[1px] border-[#179BFF] flex flex-row items-center justify-between w-full">
                                    <h6 class="text-22px text-[#179BFF]">Важно знать</h6>
                                    <img src="/resources/img/icons-warning.png" width="40px">
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="flex flex-row">
                                <td class="text-18px p-[25px] border-[1px] border-[#179BFF] flex flex-row items-center w-full text-left">Сезонные вещи, одежду, обувь</td>
                                <td class="text-18px p-[25px] border-[1px] border-[#179BFF] flex flex-row items-center w-full text-left">Жидкости, которые могут легко воспламениться</td>
                                <td class="text-18px p-[25px] border-[1px] border-[#179BFF] flex flex-row items-center w-full text-left">Ваш замок — ваша ответственность</td>
                            </tr>
                            <tr class="flex flex-row">
                                <td class="text-18px p-[25px] border-[1px] border-[#179BFF] flex flex-row items-center w-full text-left">Мебель, бытовую технику</td>
                                <td class="text-18px p-[25px] border-[1px] border-[#179BFF] flex flex-row items-center w-full text-left">Газовые баллоны, оружие, боеприпасы</td>
                                <td class="text-18px p-[25px] border-[1px] border-[#179BFF] flex flex-row items-center w-full text-left">Не курить, не жечь свечи, не греть</td>
                            </tr>
                            <tr class="flex flex-row">
                                <td class="text-18px p-[25px] border-[1px] border-[#179BFF] flex flex-row items-center w-full text-left">Книги, документы, архивы</td>
                                <td class="text-18px p-[25px] border-[1px] border-[#179BFF] flex flex-row items-center w-full text-left">Продукты, еду, напитки</td>
                                <td class="text-18px p-[25px] border-[1px] border-[#179BFF] flex flex-row items-center w-full text-left">Не загораживать проходы и выходы</td>
                            </tr>
                            <tr class="flex flex-row">
                                <td class="text-18px p-[25px] border-[1px] border-[#179BFF] flex flex-row items-center w-full text-left">Спортинвентарь, инструменты</td>
                                <td class="text-18px p-[25px] border-[1px] border-[#179BFF] flex flex-row items-center w-full text-left">Животных, растения</td>
                                <td class="text-18px p-[25px] border-[1px] border-[#179BFF] flex flex-row items-center w-full text-left">Убирать за собой мусор и пролитые напитки</td>
                            </tr>
                            <tr class="flex flex-row">
                                <td class="text-18px p-[25px] border-[1px] border-[#179BFF] flex flex-row items-center w-full text-left">Шины, чемоданы, коробки</td>
                                <td class="text-18px p-[25px] border-[1px] border-[#179BFF] flex flex-row items-center w-full text-left">Опасные химикаты, яды</td>
                                <td class="text-18px p-[25px] border-[1px] border-[#179BFF] flex flex-row items-center w-full text-left">Оформите страховку на ценные вещи</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <h2 class="text-32px">В случае<span class="text-[#179BFF]"> нарушений</span></h2>
                <div class="flex text-left flex-row justify-between flex-wrap pt-[100px]">
                    <div>
                    <div class="p-[20px]">
                        <ul class="list-disc marker-disc">
                            <li class="text-black text-22px"><span class="text-[#179BFF]">Просрочка оплаты</span> (>7 дней) —<br> блокировка доступа, штраф - 500 ₽</li>
                        </ul>
                    </div>
                    <div class="p-[20px]">
                        <ul class="list-disc marker-disc">
                            <li class="text-black text-22px"><span class="text-[#179BFF]">Мусор</span>    в коридоре - вывоз за ваш<br> счёт, штраф - 1000 ₽</li>
                        </ul>
                    </div>
                    </div>

                    <div>
                    <div class="p-[20px]">
                        <ul class="list-disc marker-disc">
                            <li class="text-black text-22px"><span class="text-[#179BFF]">Курение</span>, штраф - 5000 ₽ и<br> блокировка на месяц</li>
                        </ul>
                    </div>
                    <div class="p-[20px]">
                        <ul class="list-disc marker-disc">
                            <li class="text-black text-22px">Хранение<span class="text-[#179BFF]"> запрещённых</span> предметов -<br> расторжение договора без возврата</li>
                        </ul>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
