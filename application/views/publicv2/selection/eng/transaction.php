<section class="transaction-section">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-8">
                <div class="transaction-text text-center">
                    <h5 class="transaction-title">Statistik Price</h5>
                    <h2 class="transaction-subtitle">Lates Pricing</h2>
                    <!-- <p class="transaction-title-describe">
                        Analys pergerakan harga Lada Mu setiap harinya. </p> -->
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-lg-7 col-md-11">
                <form id="filter_harga">

                    <ul class="nav nav-pills mb-3 justify-content-center transaction-bnt-outline" id="transaction-pills-tab" role="tablist">
                        <li class="nav-item transaction-nav-item filter_harga" data-filter="harian">
                            <div class="form-group row mb-0">
                                <label for="inputEmail3" class="col-sm-1 col-form-label">Dari:</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control transaction-nav-link mb-0" name="start" id="start" placeholder="">
                                    <input type="hidden" id="limit" name="limit" value="10">
                                </div>
                            </div>
                        </li>
                        <li class="nav-item transaction-nav-item filter_harga" data-filter="harian">
                            <div class="form-group row mb-0">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Sampai:</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control transaction-nav-link" name="end" id="end" placeholder="">
                                </div>
                            </div>
                        </li>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <table class="table table-responsive transaction-table">
                    <thead>
                        <tr>
                            <th style="width : 30%">Date</th>
                            <th style="width : 30%">Mixed Quality</th>
                            <th style="width : 300px">SNI 1</th>
                            <th style="width : 300px">SNI 2</th>
                        </tr>
                    </thead>
                    <tbody id="HargaMWPTable">
                    </tbody>
                </table>
            </div>
        </div>

        <!-- <div class="row">
            <div class="col-lg-12 text-center">
                <div class="part-cart">
                    <a href="#">Browse More</a>
                </div>
            </div>
        </div> -->
    </div>
</section>
<!-- transaction section end -->