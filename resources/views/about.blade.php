@extends('layouts.app')
@section('content')
<!-- Hero секция -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center pt-[40px] sm:pt-[60px] lg:pt-[80px]">
    <h2 class="text-24px sm:text-28px lg:text-32px px-4">
        <span class="text-[#179BFF]">Self-storage</span> — это ваша личная мини-<br class="hidden sm:block">кладовка в ЖК, доступная 24/7.
    </h2>
    <h3 class="text-16px sm:text-18px lg:text-20px pt-[40px] sm:pt-[60px] lg:pt-[80px] px-4">
        Вы арендуете сухой, чистый и охраняемый контейнер нужного размера. Загружаете вещи раз в сезон или пользуетесь ежедневно — без посредников и переплат за лишние метры.
    </h3>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 pt-[40px] sm:pt-[60px] lg:pt-[80px]">
        <div class="flex flex-col items-center p-4">
            <img src="/resources/img/icon key.svg" width="70px" class="w-14 h-14 sm:w-16 sm:h-16 lg:w-[70px] lg:h-[70px]">
            <h4 class="text-16px sm:text-18px pt-[20px]">Вы устанавливаете свой замок. Ключ только у вас — никто не получит доступ без вашего ведома.</h4>
        </div>
        <div class="flex flex-col items-center p-4">
            <img src="/resources/img/icon time.png" width="70px" class="w-14 h-14 sm:w-16 sm:h-16 lg:w-[70px] lg:h-[70px]">
            <h4 class="text-16px sm:text-18px pt-[20px]">Приходите в любое время — днем, ночью, в выходные. Контейнер всегда ждет вас.</h4>
        </div>
        <div class="flex flex-col items-center p-4">
            <img src="/resources/img/icon security.svg" width="60px" class="w-12 h-12 sm:w-14 sm:h-14 lg:w-[60px] lg:h-[60px]">
            <h4 class="text-16px sm:text-18px pt-[20px]">Помещение под видеонаблюдением и в зоне контроля ЖК. Ваши вещи под надежной защитой.</h4>
        </div>
    </div>
</div>

<!-- Инструкция -->
<div class="bg-[#F3F4F6] rounded-[30px] sm:rounded-[50px] lg:rounded-[80px] mt-[40px] sm:mt-[60px] lg:mt-[80px] mx-4 sm:mx-6 lg:mx-0">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center py-[40px] sm:py-[50px] lg:py-[70px]">
        <h2 class="text-24px sm:text-28px lg:text-32px">Аренда<span class="text-[#179BFF]"> за 5 минут</span>. Без визита в офис</h2>
        <h3 class="text-16px sm:text-18px lg:text-20px pt-[40px] sm:pt-[60px] lg:pt-[80px] px-4">Вы выбрали контейнер на плане — через 5 минут он ваш. Вот пошаговая инструкция</h3>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 py-[40px] sm:py-[50px] lg:py-[60px]">
            <div class="bg-white rounded-[20px] sm:rounded-[30px] p-4 sm:p-5 py-6 sm:py-8 border border-[#71C2FF]/70 shadow-[5px_5px_15px_-5px_#71C2FF] transition duration-150 hover:border-[#179BFF]/80 hover:shadow-[7px_7px_25px_-5px_#71C2FF]">
                <h5 class="text-20px sm:text-24px pb-4 sm:pb-6">Выберите<br> контейнер</h5>
                <p class="text-16px sm:text-20px text-[#595959] pb-4 sm:pb-6">Не знаете, какой нужен? Фильтры подскажут по вашим критериям.</p>
                <img src="/resources/img/chose_container.jpg" class="w-full max-w-[200px] sm:max-w-[230px] mx-auto rounded-[15px]">
            </div>

            <div class="bg-white rounded-[20px] sm:rounded-[30px] p-4 sm:p-5 py-6 sm:py-8 border border-[#71C2FF]/70 shadow-[5px_5px_15px_-5px_#71C2FF] transition duration-150 hover:border-[#179BFF]/80 hover:shadow-[7px_7px_25px_-5px_#71C2FF]">
                <h5 class="text-20px sm:text-24px pb-4 sm:pb-6">Забронируйте<br> контейнер</h5>
                <p class="text-16px sm:text-20px text-[#595959] pb-4 sm:pb-6">Нажмите кнопку — и выдохните. Контейнер уже ждёт.</p>
                <img src="/resources/img/booking.jpg" class="w-full max-w-[200px] sm:max-w-[230px] mx-auto rounded-[15px]">
            </div>

            <div class="bg-white rounded-[20px] sm:rounded-[30px] p-4 sm:p-5 py-6 sm:py-8 border border-[#71C2FF]/70 shadow-[5px_5px_15px_-5px_#71C2FF] transition duration-150 hover:border-[#179BFF]/80 hover:shadow-[7px_7px_25px_-5px_#71C2FF]">
                <h5 class="text-20px sm:text-24px pb-4 sm:pb-6">Заключите<br> договор</h5>
                <p class="text-16px sm:text-20px text-[#595959] pb-2">В договоре всего 2 страницы. Без мелкого шрифта и подвохов.</p>
                <img src="/resources/img/agreement.jpg" class="w-full max-w-[200px] sm:max-w-[230px] mx-auto rounded-[15px] mt-4">
            </div>

            <div class="bg-white rounded-[20px] sm:rounded-[30px] p-4 sm:p-5 py-6 sm:py-8 border border-[#71C2FF]/70 shadow-[5px_5px_15px_-5px_#71C2FF] transition duration-150 hover:border-[#179BFF]/80 hover:shadow-[7px_7px_25px_-5px_#71C2FF]">
                <h5 class="text-20px sm:text-24px pb-4 sm:pb-6">Получите<br> доступ</h5>
                <p class="text-16px sm:text-20px text-[#595959] pb-4 sm:pb-6">Ключи только у вас. Даже мы не можем зайти без вашего разрешения.</p>
                <img src="/resources/img/access.jpg" class="w-full max-w-[200px] sm:max-w-[230px] mx-auto rounded-[15px]">
            </div>
        </div>
    </div>
</div>

<!-- Преимущества -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center pt-[50px] sm:pt-[70px] lg:pt-[100px]">
    <h2 class="text-24px sm:text-28px lg:text-32px"><span class="text-[#179BFF]">Преимущества</span> аренды кладовых.</h2>
    <h3 class="text-16px sm:text-18px lg:text-20px pt-[40px] sm:pt-[60px] lg:pt-[80px] px-4">Вещи больше не путаются под ногами. Вы не платите за лишние метры в квартире. Идеальный порядок без компромиссов.</h3>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6 text-left pt-[50px] sm:pt-[70px] lg:pt-[100px]">
        <div class="flex flex-col border-b border-[#179BFF] pb-4">
            <div class="flex items-center pb-2">
                <img src="/resources/img/icon-num_1.png" width="40px" height="40px" class="w-8 h-8 sm:w-10 sm:h-10">
                <h3 class="text-20px sm:text-24px text-[#179BFF] px-3">Круглосуточный доступ</h3>
            </div>
            <p class="text-16px sm:text-18px text-[#595959]">Приходите за вещами в любое время. Никаких графиков работы и очередей — только вы и ваша кладовка.</p>
        </div>

        <div class="flex flex-col border-b border-[#179BFF] pb-4">
            <div class="flex items-center pb-2">
                <img src="/resources/img/icon-num_2.png" width="40px" height="40px" class="w-8 h-8 sm:w-10 sm:h-10">
                <h3 class="text-20px sm:text-24px text-[#179BFF] px-3">Личная безопасность</h3>
            </div>
            <p class="text-16px sm:text-18px text-[#595959]">Каждый контейнер запирается на ваш личный замок. Доступ посторонних исключен. Вы единственный владелец ключа.</p>
        </div>

        <div class="flex flex-col border-b border-[#179BFF] pb-4">
            <div class="flex items-center pb-2">
                <img src="/resources/img/icon-num_3.png" width="40px" height="40px" class="w-8 h-8 sm:w-10 sm:h-10">
                <h3 class="text-20px sm:text-24px text-[#179BFF] px-3">Чистота и порядок</h3>
            </div>
            <p class="text-16px sm:text-18px text-[#595959]">Регулярная уборка общих зон, сухие и проветриваемые помещения. Ваши вещи не отсыреют и не испортятся.</p>
        </div>

        <div class="flex flex-col border-b border-[#179BFF] pb-4">
            <div class="flex items-center pb-2">
                <img src="/resources/img/icon-num_4.png" width="40px" height="40px" class="w-8 h-8 sm:w-10 sm:h-10">
                <h3 class="text-20px sm:text-24px text-[#179BFF] px-3">Размеры на любой запрос</h3>
            </div>
            <p class="text-16px sm:text-18px text-[#595959]">Контейнеры разного объема — от компактных для коробок до просторных для мебели и велосипедов.</p>
        </div>

        <div class="flex flex-col border-b border-[#179BFF] pb-4">
            <div class="flex items-center pb-2">
                <img src="/resources/img/icon-num_5.png" width="40px" height="40px" class="w-8 h-8 sm:w-10 sm:h-10">
                <h3 class="text-20px sm:text-24px text-[#179BFF] px-3">Гибкая аренда</h3>
            </div>
            <p class="text-16px sm:text-18px text-[#595959]">Оплата по дням без долгосрочных контрактов. Начали пользоваться — арендуете, перестали — закрываете договор.</p>
        </div>

        <div class="flex flex-col border-b border-[#179BFF] pb-4">
            <div class="flex items-center pb-2">
                <img src="/resources/img/icon-num_6.png" width="40px" height="40px" class="w-8 h-8 sm:w-10 sm:h-10">
                <h3 class="text-20px sm:text-24px text-[#179BFF] px-3">Прозрачные тарифы</h3>
            </div>
            <p class="text-16px sm:text-18px text-[#595959]">Фиксированная стоимость за день. Никаких скрытых комиссий, платы за въезд или дополнительных начислений.</p>
        </div>
    </div>
</div>

<!-- Правила -->
<div class="bg-[#F3F4F6] rounded-[30px] sm:rounded-[50px] lg:rounded-[80px] mt-[40px] sm:mt-[60px] lg:mt-[80px] mx-4 sm:mx-6 lg:mx-0">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center py-[40px] sm:py-[50px] lg:py-[70px]">
        <h2 class="text-24px sm:text-28px lg:text-32px"><span class="text-[#179BFF]">Правила</span> пользования — просто о важном</h2>
        <h3 class="text-16px sm:text-18px lg:text-20px pt-[40px] sm:pt-[60px] lg:pt-[80px]">Честные правила, которые работают для всех</h3>

        <!-- Таблица правил -->
        <div class="py-[40px] sm:py-[70px] lg:py-[100px] overflow-x-auto">
            <div class="min-w-[600px] lg:min-w-full">
                <div class="grid grid-cols-3 border border-[#179BFF] rounded-[15px] overflow-hidden">
                    <div class="p-3 sm:p-5 border-r border-[#179BFF] bg-white flex items-center justify-between flex-wrap gap-2">
                        <h6 class="text-16px sm:text-22px text-[#179BFF]">Можно хранить</h6>
                        <img src="/resources/img/icons-success.svg" width="30px" class="w-6 h-6 sm:w-8 sm:h-8">
                    </div>
                    <div class="p-3 sm:p-5 border-r border-[#179BFF] bg-white flex items-center justify-between flex-wrap gap-2">
                        <h6 class="text-16px sm:text-22px text-[#179BFF]">Нельзя хранить</h6>
                        <img src="/resources/img/icons-none.svg" width="30px" class="w-6 h-6 sm:w-8 sm:h-8">
                    </div>
                    <div class="p-3 sm:p-5 bg-white flex items-center justify-between flex-wrap gap-2">
                        <h6 class="text-16px sm:text-22px text-[#179BFF]">Важно знать</h6>
                        <img src="/resources/img/icons-warning.png" width="30px" class="w-6 h-6 sm:w-8 sm:h-8">
                    </div>

                    <div class="p-3 sm:p-5 border-t border-r border-[#179BFF] text-left text-12px sm:text-18px">Сезонные вещи, одежду, обувь</div>
                    <div class="p-3 sm:p-5 border-t border-r border-[#179BFF] text-left text-12px sm:text-18px">Жидкости, которые могут легко воспламениться</div>
                    <div class="p-3 sm:p-5 border-t border-[#179BFF] text-left text-12px sm:text-18px">Ваш замок — ваша ответственность</div>

                    <div class="p-3 sm:p-5 border-t border-r border-[#179BFF] text-left text-12px sm:text-18px">Мебель, бытовую технику</div>
                    <div class="p-3 sm:p-5 border-t border-r border-[#179BFF] text-left text-12px sm:text-18px">Газовые баллоны, оружие, боеприпасы</div>
                    <div class="p-3 sm:p-5 border-t border-[#179BFF] text-left text-12px sm:text-18px">Не курить, не жечь свечи, не греть</div>

                    <div class="p-3 sm:p-5 border-t border-r border-[#179BFF] text-left text-12px sm:text-18px">Книги, документы, архивы</div>
                    <div class="p-3 sm:p-5 border-t border-r border-[#179BFF] text-left text-12px sm:text-18px">Продукты, еду, напитки</div>
                    <div class="p-3 sm:p-5 border-t border-[#179BFF] text-left text-12px sm:text-18px">Не загораживать проходы и выходы</div>

                    <div class="p-3 sm:p-5 border-t border-r border-[#179BFF] text-left text-12px sm:text-18px">Спортинвентарь, инструменты</div>
                    <div class="p-3 sm:p-5 border-t border-r border-[#179BFF] text-left text-12px sm:text-18px">Животных, растения</div>
                    <div class="p-3 sm:p-5 border-t border-[#179BFF] text-left text-12px sm:text-18px">Убирать за собой мусор и пролитые напитки</div>

                    <div class="p-3 sm:p-5 border-t border-r border-[#179BFF] text-left text-12px sm:text-18px">Шины, чемоданы, коробки</div>
                    <div class="p-3 sm:p-5 border-t border-r border-[#179BFF] text-left text-12px sm:text-18px">Опасные химикаты, яды</div>
                    <div class="p-3 sm:p-5 border-t border-[#179BFF] text-left text-12px sm:text-18px">Оформите страховку на ценные вещи</div>
                </div>
            </div>
        </div>

        <h2 class="text-24px sm:text-28px lg:text-32px">В случае<span class="text-[#179BFF]"> нарушений</span></h2>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 text-left pt-[40px] sm:pt-[70px] lg:pt-[100px]">
            <div>
                <div class="p-3 sm:p-5">
                    <ul class="list-disc marker-disc list-inside space-y-3">
                        <li class="text-16px sm:text-22px"><span class="text-[#179BFF]">Просрочка оплаты</span> (&gt;7 дней) —<br class="hidden sm:block"> блокировка доступа, штраф - 500 ₽</li>
                    </ul>
                </div>
                <div class="p-3 sm:p-5">
                    <ul class="list-disc marker-disc list-inside space-y-3">
                        <li class="text-16px sm:text-22px"><span class="text-[#179BFF]">Мусор</span> в коридоре - вывоз за ваш<br class="hidden sm:block"> счёт, штраф - 1000 ₽</li>
                    </ul>
                </div>
            </div>
            <div>
                <div class="p-3 sm:p-5">
                    <ul class="list-disc marker-disc list-inside space-y-3">
                        <li class="text-16px sm:text-22px"><span class="text-[#179BFF]">Курение</span>, штраф - 5000 ₽ и<br class="hidden sm:block"> блокировка на месяц</li>
                    </ul>
                </div>
                <div class="p-3 sm:p-5">
                    <ul class="list-disc marker-disc list-inside space-y-3">
                        <li class="text-16px sm:text-22px">Хранение<span class="text-[#179BFF]"> запрещённых</span> предметов -<br class="hidden sm:block"> расторжение договора без возврата</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
