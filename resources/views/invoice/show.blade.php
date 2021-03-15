@extends('layouts.invoice-layout')

@section('content')
    <body>
    <div id="container">
        <div style="text-align: center;padding-bottom: 0;" class="invoice-top">
            <section id="memo" style="text-align: center">

                <h2 style="font-family: 'Cinzel', serif;font-size: 30px"> {company_name}</h2>
                <br>
                <div style="font-size: 12px">Usluge prevođenja</div>
                <div style="padding-top: 5px">
                    <img src="img/clipart213547.png" style="width: 100px;"/>
                </div>

            </section>
        </div>
        <div class="invoice-body" style="padding-bottom: 15px">
            <section id="invoice-title-number">
                <!--          <span id="title">{invoice_title}</span>-->
                <span style="font-size: 20px;">Faktura za</span>
                <span id="title" style="font-size: 20px;">{client_name}</span>
                <br/>
                <span id="number">{invoice_number}</span>
                <br/>
                <span class="hidden">{issue_date_label}</span> <span>{issue_date}</span>

            </section>

            <div class="clearfix"></div>

            <section id="client-invoice-info">
                <table cellpadding="0" cellspacing="0">
                    <tr>
                        <!--                    <td>{due_date_label}</td>-->
                        <td colspan="2">Detalji:</td>
                        <!--                    <td>{due_date}</td>-->
                        <td></td>
                        <td class="gray-text">{bill_to_label}</td>
                    </tr>
                    <tr>
                        <td colspan="2">Datum izdavanja:</td>
                        <!--              <td>{net_term}</td>-->
                        <td colspan="1"><span class="hidden">{issue_date_label}</span> <span>{issue_date}</span></td>
                        <td class="bold">{client_name}</td>
                    </tr>
                    <tr>
                        <td colspan="2"><span>Mesto izdavanja:</span></td>
                        <td colspan="1"><span>Šabac</span></td>
                        <td colspan="3">{client_address}</td>
                    </tr>
                    <tr>
                        <td colspan="2"><span>Datum prometa:</span></td>
                        <td colspan="1"><span>{terms}</span></td>
                        <td>{client_city_zip_state}</td>
                    </tr>
                    <tr>
                        <td colspan="2">Rok za plaćanje (dana):</td>
                        <td>{net_term}</td>
                        <td>{client_phone_fax}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>{client_email}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>{client_other}</td>
                    </tr>
                </table>
            </section>

            <div class="clearfix"></div>

            <section id="items">

                <table cellpadding="0" cellspacing="0">

                    <tr>
                        <th>{item_row_number_label}</th> <!-- Dummy cell for the row number and row commands -->
                        <th style="width: 55%;">{item_description_label}</th>
                        <th style="width: 10%;">{item_quantity_label}</th>
                        <th style="width: 15%;">{item_price_label}</th>
                        <th>{item_discount_label}</th>
                        <th>{item_tax_label}</th>
                        <th style="width: 20%;">{item_line_total_label}</th>
                    </tr>

                    <tr data-iterate="item">
                        <td>{item_row_number}</td> <!-- Don't remove this column as it's needed for the row commands -->
                        <td>{item_description}</td>
                        <td>{item_quantity}</td>
                        <td>{item_price}</td>
                        <td>{item_discount}</td>
                        <td>{item_tax}</td>
                        <td>{item_line_total}</td>
                    </tr>

                </table>

            </section>

            <section id="sums">

                <table cellpadding="0" cellspacing="0">
                    <!--            <tr>-->
                    <!--              <th>{amount_subtotal_label}</th>-->
                    <!--              <td>{amount_subtotal}</td>-->
                    <!--            </tr>-->

                    <tr data-iterate="tax">
                        <th>{tax_name}</th>
                        <td>{tax_value}</td>
                    </tr>

                    <!--            <tr class="amount-total">-->
                    <!--              <th>{amount_total_label}</th>-->
                    <!--              <td>{amount_total}</td>-->
                    <!--            </tr>-->

                    <!-- You can use attribute data-hide-on-quote="true" to hide specific information on quotes.
                         For example Invoicebus doesn't need amount paid and amount due on quotes  -->
                    <!--            <tr data-hide-on-quote="true">-->
                    <!--              <th>{amount_paid_label}</th>-->
                    <!--              <td>{amount_paid}</td>-->
                    <!--            </tr>-->

                    <tr data-hide-on-quote="true">
                        <th>{amount_due_label}</th>
                        <th colspan="2">{amount_due}</th>
                    </tr>
                    <tr data-hide-on-quote="true">
                        <th colspan="2">{amount_paid_label}</th>
                    </tr>
                    <tr></tr>
                    {{--                    <tr data-hide-on-quote="true">--}}
                    {{--                        <th>{amount_due_label}</th>--}}
                    {{--                        <td>{amount_due}</td>--}}
                    {{--                    </tr>--}}
                </table>

            </section>

            <div class="clearfix"></div>

            <section id="terms">

                <span class="hidden">{terms_label}</span>
                <div class="hidden">{terms}</div>

            </section>
            <br>

            <div class="payment-info" style="text-align: center">
                <div style="font-size: 13px"><b>{payment_info1}</b></div>
                <br>
                <div style="margin-left: auto; margin-right: auto">{payment_info2}</div>
                <div>{payment_info3}</div>
                <!--            <div>{payment_info4}</div>-->
                <!--            <div>{payment_info5}</div>-->
            </div>

            <div style="padding-top:10px;text-align: center;">
                <div>Romina Jovanović PR prevođenje Šabac</div>
                <div>{company_address}</div>
                <div>{company_city_zip_state}</div>
                <div>{company_phone_fax}</div>
            </div>
        </div>
        <div class="currency" style="text-align: center">
            <span>NAPOMENA: Obveznik nije u sistemu PDV po članu 33. Zakona o PDV-u</span>
        </div>
        <div class="currency" style="text-align: center">
            <span>{currency_label}</span> <span>{currency}</span>
        </div>

        <div class="bottom-stripe"></div>
    </div>

    <script src="http://cdn.invoicebus.com/generator/generator.min.js?data=true"></script>

    </body>
@stop


