<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!--Author      : @arboshiki-->
<style>
    #invoice{
    padding: 30px;
}

.invoice {
    position: relative;
    background-color: #FFF;
    min-height: 680px;
    padding: 15px
}

.invoice header {
    padding: 10px 0;
    margin-bottom: 20px;
    border-bottom: 1px solid
}

.invoice .company-details {
    text-align: right
}

.invoice .company-details .name {
    margin-top: 0;
    margin-bottom: 0
}

.invoice .contacts {
    margin-bottom: 20px
}

.invoice .invoice-to {
    text-align: left
}

.invoice .invoice-to .to {
    margin-top: 0;
    margin-bottom: 0
}

.invoice .invoice-details {
    text-align: right
}

.invoice .invoice-details .invoice-id {
    margin-top: 0;
    color: #3989c6
}

.invoice main {
    padding-bottom: 50px
}

.invoice main .thanks {
    margin-top: -100px;
    font-size: 2em;
    margin-bottom: 50px
}

.invoice main .notices {
    padding-left: 6px;
    border-left: 6px solid #3989c6
}

.invoice main .notices .notice {
    font-size: 1.2em
}

.invoice table {
    width: 100%;
    border-collapse: collapse;
    border-spacing: 0;
    margin-bottom: 20px
}

.invoice table td,.invoice table th {
    padding: 15px;
    /* background: #eee; */
    border-bottom: 1px solid #fff
}

.invoice table th {
    white-space: nowrap;
    font-weight: 400;
    font-size: 16px
}

.invoice table td h3 {
    margin: 0;
    font-weight: 400;
    color: #3989c6;
    font-size: 1.2em
}

.invoice table .qty,.invoice table .total,.invoice table .unit {
    text-align: right;
    font-size: 1.2em
}

.invoice table .no {
    color: #black;
    font-size: 1.6em;
    /* background: #3989c6 */
}

.invoice table .unit {
    background: #ddd
}

.invoice table .total {
    background: #3989c6;
    color: #fff
}

.invoice table tbody tr:last-child td {
    border: none
}

.invoice table tfoot td {
    background: 0 0;
    border-bottom: none;
    white-space: nowrap;
    text-align: right;
    padding: 10px 20px;
    font-size: 1.2em;
    border-top: 1px solid #aaa
}

.invoice table tfoot tr:first-child td {
    border-top: none
}

.invoice table tfoot tr:last-child td {
    color: #3989c6;
    font-size: 1.4em;
    border-top: 1px solid #3989c6
}

.invoice table tfoot tr td:first-child {
    border: none
}

.invoice footer {
    width: 100%;
    text-align: center;
    color: #777;
    border-top: 1px solid #aaa;
    padding: 8px 0
}

@media print {
    .invoice {
        font-size: 11px!important;
        overflow: hidden!important
    }

    .invoice footer {
        position: absolute;
        bottom: 10px;
        page-break-after: always
    }

    .invoice>div:last-child {
        page-break-before: always
    }
}
    </style>
<div id="invoice">

    <div class="toolbar hidden-print">
        <div class="text-right">
            <button id="printInvoice" class="btn btn-info"><i class="fa fa-print"></i> Print</button>
        </div>
        <hr>
    </div>
    <div class="invoice overflow-auto">
        <div style="min-width: 600px">
            <header>
                <div class="row">
                    <div class="col">
                        <a target="_blank" href="https://espicrm.com">
                            <img src="https://espicrm.com/logo.svg" data-holder-rendered="true" style="height: 100px;"/>
                            </a>
                    </div>
                    <div class="col company-details">
                        <h2 class="name">
                            <a target="_blank" href="https://espicrm.com" style="color: #e42427;">
                           ESPI VISA CONSULTANTS PVT. LTD
                            </a>
                        </h2>
                        <div>1st Floor , Galav Chambers</div>
                        <div>Dairy Den Circle , Sayajigunj</div>
                        <div>Baroda -390 005</div>
                    </div>
                </div>
            </header>
            <main>
                <div class="row contacts">
                    <div class="col invoice-to">
                        <div class="text-gray-light">INVOICE TO:</div>
                        {{-- <h2 class="to">John Doe</h2>
                        <div class="address">796 Silver Harbour, TX 79273, US</div> --}}
                    <div class="address"><?php  echo $transaction->enquiry_id   ?> </div>
                        <div class="email"><a href="mailto:john@example.com"><?php  echo $transaction->email   ?></a></div>
                    </div>
                    <div class="col invoice-details">
                        {{-- <h1 class="invoice-id">INVOICE 3-2-1</h1> --}}
                        <div class="date"><?php  echo $transaction->created_at->format('d-m-Y')   ?></div>
                        {{-- <div class="date">Due Date: 30/10/2018</div> --}}
                    </div>
                </div>
                <table border="0" cellspacing="0" cellpadding="0">
                    <thead>
                        <tr>
                            {{-- <th>#</th>
                            <th class="text-left">DESCRIPTION</th>
                            <th class="text-right">HOUR PRICE</th>
                            <th class="text-right">HOURS</th>
                            <th class="text-right">TOTAL</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        <tr >

    <td class="no" >Received With Thanks From :- <strong><?php  echo $transaction->name  ?> </strong></td>
                            {{-- <td class="text-left">
                                <h3>Youtube channel</h3>
                                </a>
                            </td> --}}
                        </tr>
                        <tr>
                            <td class="no">The Sum of Rupees :- <strong><?php  echo $transaction->price  ?></strong></td>
                            <td class="no">Enrolled :- <strong><?php  echo $transaction->title  ?></strong>   </td>
                            {{-- <td class="text-left">
                                <h3>Website Design</h3> --}}
                        </tr>
                        <tr>
                            <td class="no">By DD / Cheque No:- <strong><?php  echo $transaction->check_number  ?></strong></td>
                            {{-- <td class="text-left"><h3>Website Development</h3></td> --}}
                            <td class="no">Dated :- <strong><?php  echo $transaction->check_date  ?></strong></td>
                        </tr>
                        <tr>
                            <td class="no">Package :- <strong><?php  echo $transaction->package_name  ?></strong>   </td>

                            <td class="no">Cash Payment :-  <strong><?php  echo "cash Payment   "  ?></strong></td>

                            {{-- <td class="text-left"><h3>Website Development</h3></td> --}}
                        </tr>
                        {{-- <tr>
                            <td class="no">03</td>
                            <td class="text-left"><h3>Search Engines Optimization</h3>Optimize the site for search engines (SEO)</td>
                            <td class="unit">$40.00</td>
                            <td class="qty">20</td>
                            <td class="total">$800.00</td>
                        </tr> --}}
                    </tbody>
                    <tfoot>
                        {{-- <tr>
                            <td colspan="2"></td>
                            <td colspan="2">SUBTOTAL</td>
                            <td>$5,200.00</td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2">TAX 25%</td>
                            <td>$1,300.00</td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2">GRAND TOTAL</td>
                            <td>$6,500.00</td>
                        </tr> --}}
                    </tfoot>
                </table><br><br><br><br>
                <div class="notices">
                    {{-- <div>NOTICE:</div> --}}
                    <div class="notice">
                        For ESPI VISA CONSULTANTS PVT LTD.</div>
                </div>
            </main>
            <footer>
                {{-- Invoice was created on a computer and is valid without the signature and seal. --}}
            </footer>
        </div>
        <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
        <div></div>
    </div>
</div>
<script>
     $('#printInvoice').click(function(){
            Popup($('.invoice')[0].outerHTML);
            function Popup(data)
            {
                window.print();
                return true;
            }
        });
    </script>
