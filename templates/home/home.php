<?php include __DIR__ . '/../header.php'; ?>
<div class="container">
        <div class="d-flex align-items-center flex-column justify-content-center">
        <h2 class="form-group">Currency conversion</h2>
            <form method="POST" id="currency-form">
        <div class="form-group">
            <label>From:</label>
            <select class="form-control" name="from_currency">
                <option value="USD" selected>United States Dollar (USA)</option>
            </select>
        </div>
        <div class="form-group">
            <label>Amount:</label>
            <input class="form-control" type="number" min="1" placeholder="currency" name="amount" id="amount" required >
        </div>
        <div class="form-group">
            <label>To:</label>
            <select class="form-control" name="to_currency">
                <?php
                foreach($currencies as $currency){
                    ?>
                    <option value="<?php echo $currency['currency_code']; ?>"><?php echo $currency['currency_name']; ?> (<?php echo $currency['currency_code']; ?>)</option>
                    <?php
                }
                ?>
            </select>

        </div>
        <div class="form-group">
            <button type="submit" name="convert" id="convert" class="btn btn-outline-success">Convert</button>
        </div>
    </form>
        <div class="form-group">
            <div id="converted_rate"></div>
            <div id="converted_amount"></div>
        </div>
    </div>
    </div>
<?php include __DIR__ . '/../footer.php'; ?>
