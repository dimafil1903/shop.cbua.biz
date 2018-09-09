@extends('layouts.front.app')
@section('content')
    <div class="container">
<div class="main">
    <div class="row">


        <div class="col-md-3  col-sm-12 col-xs-12 filter-left">
            <div class="aside aside__left">
                <div class="moduletable  mod_virtuemart_category">
                    <div class="module_content">
                        <div class="row">
                            <div class="col-md-12" id="list_info">
                                <fieldset class="form-group">
                                    <legend class="info-menu-title">
                                        Інформація:
                                    </legend>

                                    <div class="clear"><br></div>


                                    <p>
                                        <i aria-hidden="true" class="fa fa-info-circle"></i>
                                        <a href="/terms" class="active-info">
                                            Умови користування сайтом		</a>
                                    </p>

                                    <p>
                                        <i aria-hidden="true" class="fa fa-info-circle"></i>
                                        <a href="/delivery">
                                          Про доставку	</a>
                                    </p>
                                    <div class="clear"><br></div>

                                </fieldset>
                                <div class="clear"><br></div>

                                <div class="clear"><br></div>


                            </div>
                        </div>
                        <div class="clear"><br>

                        </div>


                    </div>
                </div>


            </div>


        </div>

        <div class="col-md-9">


            <div class="main-content">
                <div class="page category-view">
                    <div class="page_heading">
                        <h1>Варіанти доставки</h1>
                    </div>
                </div>
                <div id="container">
                    Доставка товарів по Україні здійснюється на відділення транспортної компанії, яке не має обмежень по вазі: «Нова пошта»,«Укрпошта» Доставку відправлення оплачує клієнт. При готівковому розрахунку клієнт додатково оплачує доставку грошей назад. Розрахувати приблизну вартість перевезення можна тут :
                    <div class="clear">
                        <br>
                    </div>
                    <br>
                    <div class="row ">
                        <div class="col-md-3 col-lg-3 col-sm-3 col-xs-6 col-centered wow fadeInDown animated  animated" style="visibility: visible; animation-name: fadeInDown;">
                            <div class="whitebg center">
                                <a target="_blank" href="http://novaposhta.ua/uk/delivery"><img width="100%" src="https://novaposhta.ua/runtime/cache/320x95/nova–poshta-15-long_320px.png">

                                </a>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3 col-sm-3 col-xs-6 col-centered wow fadeInDown animated  animated" style="visibility: visible; animation-name: fadeInDown;">
                            <div class="whitebg center">
                                <a target="_blank" href="https://a.ukrposhta.ua/calc/s/calc.html"><img width="100%" src="https://ukrposhta.ua/wp-content/themes/twentyeleven/images/Upost_logo-ua.svg">

                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="clear">
                        <br>
                    </div>


                    <p>
                        <b>Відправлення здійснюється з понеділка по п'ятницю з 9.00 до 16.00, в суботу - з 10.00 до 13.00.</b> Зверніть увагу: товар на відділенні транспортної компанії зберігається протягом 5 днів, після чого автоматично повертається відправнику.
                    </p>
                    <p>
                        Необхідно обов'язково оглянути товар перед отриманням, в іншому випадку жодні претензії щодо зовнішнього вигляду розглядатись не будуть.
                    </p>

                    <p>
                        Ми, зі свого боку, зробимо все для максимально оперативного та зручного виконання замовлення!
                    </p>
                    <div class="clear">
                        <br>
                    </div>
                    <br>		<div class="clear"><br></div>
                </div>
            </div>


        </div>


    </div> <!--END  class="row"-->
</div>
    </div>
    @endsection