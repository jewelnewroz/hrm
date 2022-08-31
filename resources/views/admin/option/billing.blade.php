<form action='/dashboard/option/store' method="POST">
    @csrf
    <div class="row">
        <div class="col-sm-6 padding-right">
            <div class="form-group">
                <label for="domain_ext_enable">Scheduler Enabled?</label>
                <select name="scheduler_enabled" class="form-control" id="domain_ext_enable">
                    <option value="0" >No</option>
                    <option value="1" @if( getOption('scheduler_enabled') == 1 ) selected @endif>Yes</option>
                </select>
                <small id="emailHelp" class="form-text text-muted">Daily scheduler run automatically if enabled</small>
            </div>
            <div class="form-group">
                <label for="domain_ext_enable">Use domain with CustomerId?</label>
                <select name="domain_ext_enable" class="form-control" id="domain_ext_enable">
                    <option value="0" >No</option>
                    <option value="1" @if( getOption('domain_ext_enable') == 1 ) selected @endif>Yes</option>
                </select>
                <small id="emailHelp" class="form-text text-muted">Example- (john@msonlinebd.com)</small>
            </div>
            <div class="form-group">
                <label for="domain_ext_enable">Domain Name?</label>
                <input name="domain_name" class="form-control" id="domain_name" value="{{ getOption('domain_name', '') }}" placeholder="Domain Name">
                <small id="emailHelp" class="form-text text-muted">Example- (msonlinebd.com)</small>
            </div>
            <div class="form-group">
                <label for="remote_ip">IP Address required?</label>
                <select name="remote_ip" class="form-control" id="remote_ip">
                    <option value="0">No</option>
                    <option value="1" @if( getOption('remote_ip') == 1 ) selected @endif>Yes</option>
                </select>
            </div>
            <div class="form-group">
                <label for="remote_mac">Mac Address required?</label>
                <select name="remote_mac" class="form-control" id="remote_mac">
                    <option value="0">No</option>
                    <option value="1"  @if( getOption('remote_mac') == 1 ) selected @endif>Yes</option>
                </select>
            </div>
            <div class="form-group">
                <label for="customer_auto_enable">Customer enable</label>
                <select name="customer_auto_enable" class="form-control" id="customer_auto_enable">
                    <option value="0">Manual</option>
                    <option value="1" @if( getOption('customer_auto_enable') == 1 ) selected @endif>Auto</option>
                </select>
            </div>
            <div class="form-group">
                <label for="customer_auto_disable">Customer disable</label>
                <select name="customer_auto_disable" class="form-control" id="customer_auto_disable">
                    <option value="0">Manual</option>
                    <option value="1" @if( getOption('customer_auto_disable') == 1 ) selected @endif>Auto</option>
                </select>
            </div>
            <div class="form-group">
                <label for="customer_auto_disable">Auto disable for min due bill?</label>
                <input type="number" name="minimum_due_amount" value="{{ getOption('minimum_due_amount', 0) }}" class="form-control" id="minimum_due_amount">
            </div>
            <div class="form-group">
                <label for="customer_auto_disable">Auto Enable for below min dues?</label>
                <input type="number" name="min_due_enable" value="{{ getOption('min_due_enable', 0) }}" class="form-control" id="min_due_enable">
            </div>
            <div class="form-group">
                <label for="auto_disable_date">Disable date</label>
                <input class="form-control" name="auto_disable_date" value="{{ getOption('auto_disable_date', date('Y-m-15')) }}" id="auto_disable_date">
            </div>
            <div class="form-group">
                <label>Bill calculation format</label>
                <select name="number_format" class="form-control">
                    <option value="ceil" @if( getOption('number_format') == 'ceil' ) selected @endif>Ceil</option>
                    <option value="round" @if( getOption('number_format') == 'round' ) selected @endif>Round</option>
                    <option value="floor" @if( getOption('number_format') == 'floor' ) selected @endif>Floor</option>
                </select>
            </div>
            <div class="form-group">
                <label for="bill_auto_generate">Auto bill generate?</label>
                <select name="bill_auto_generate" class="form-control" id="bill_auto_generate">
                    <option value="0">Manual</option>
                    <option value="1" @if( getOption('bill_auto_generate') == 1 ) selected @endif>Auto</option>
                </select>
            </div>
            <div class="form-group">
                <label for="bill_type">Bill Calculate</label>
                <select name="bill_type" class="form-control" id="bill_type">
                    <option value="bi-monthly" @if( getOption('bill_type') == 'bi-monthly' ) selected @endif>Bi-Monthly</option>
                    <option value="quarterly" @if( getOption('bill_type') == 'quarterly' ) selected @endif>Quarterly</option>
                    <option value="daily" @if( getOption('bill_type') == 'daily' ) selected @endif>Daily</option>
                </select>
            </div>
            <div class="form-group">
                <label for="billing_currency">Billing Currency</label>
                <input name="billing_currency" class="form-control" id="billing_currency" value="{{getOption('billing_currency', 'Tk.')}}">
            </div>
        </div>
        <div class="col-sm-6">
            <h4>Generate bill</h4>
            <button class="btn btn-warning btn-lg">Generate bill</button>
            <h4>Disable due list</h4>
            <button class="btn btn-danger-outline btn-lg" id="disableCustomerArtisanCall">Disable customer</button>
        </div>
    </div>
    <div class="form-group">
        <input type="hidden" name="tab" value="billing">
        <input type="submit" value="Save Changes" name="submit" class="btn btn-primary save-general-settings">
    </div>
</form>
