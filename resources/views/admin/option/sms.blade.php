<form action='/dashboard/option/store' method="POST">
    @csrf
    <div class="row">
        <div class="col-sm-6 padding-right date">
            <div class="form-group">
                <label for="sms_enabled">SMS Enable</label>
                <select name="sms_enabled" class="form-control" id="bill_type">
                    <option value="1" @if( getOption('sms_enabled') == '1' ) selected @endif>Yes</option>
                    <option value="0" @if( getOption('sms_enabled') == '0' ) selected @endif>No</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">API Url</label>
                <input type="text" name="sms_api_url" value="{{ getOption('sms_api_url') }}" class="form-control"
                       id="sms_api_url" placeholder="Api Url">
            </div>
            <div class="form-group">
                <label for="">Masking (Sender number / name)</label>
                <div class="input-group">
                    <input type="text" name="sms_api_masking" value="{{ getOption('sms_api_masking') }}"
                       class="form-control" id="sms_api_masking" placeholder="Api Sender (From)">
                    <div class="input-group-append">
                        <input type="text" class="form-control" name="sms_api_masking_key" value="{{ getOption('sms_api_masking_key') }}" placeholder="Sender param" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="">API User</label>
                <div class="input-group">
                    <input type="text" name="sms_api_user" value="{{ getOption('sms_api_user') }}" class="form-control"
                       id="sms_api_user" placeholder="API User">
                    <div class="input-group-append">
                        <input type="text" class="form-control" name="sms_api_user_key" value="{{ getOption('sms_api_user_key') }}" placeholder="User param">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="">API Password</label>
                <div class="input-group">
                    <input type="password" name="sms_api_password" value="{{ getOption('sms_api_password') }}"
                       class="form-control" id="sms_api_password" placeholder="Api Password">
                    <div class="input-group-append">
                        <input type="text" class="form-control" name="sms_api_password_key" value="{{ getOption('sms_api_password_key') }}" placeholder="Password param">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="">API Secret (if required)</label>
                <div class="input-group">
                    <input type="password" name="sms_api_secret" value="{{ getOption('sms_api_secret') }}"
                           class="form-control" id="sms_api_secret" placeholder="Api Secret">
                    <div class="input-group-append">
                        <input type="text" class="form-control" name="sms_api_secret_key" value="{{ getOption('sms_api_secret_key') }}" placeholder="Secret param">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="">Message format(Text/Flash)</label>
                <div class="input-group">
                    <input type="text" name="sms_api_format" value="{{ getOption('sms_api_format', 'TEXT') }}"
                           class="form-control" id="sms_api_format" placeholder="Message format">
                    <div class="input-group-append">
                        <input type="text" class="form-control" name="sms_api_format_key" value="{{ getOption('sms_api_format_key') }}" placeholder="Format param" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <lable for="">Mobile number (To) param</lable>
                <input type="text" name="sms_api_number_key" class="form-control" value="{{ getOption('sms_api_number_key') }}" placeholder="Number param" required>
            </div>
            <div class="form-group">
                <lable for="">Message param</lable>
                <input type="text" name="sms_api_message_key" class="form-control" value="{{ getOption('sms_api_message_key') }}" placeholder="Message param" required>
            </div>
        </div>
        <div class="col-sm-6 padding-right">
            <div class="form-group">
                <label for="">Payment notification</label>
                <select name="payment_notification_enabled" class="form-control" id="bill_type">
                    <option value="1" @if( getOption('payment_notification_enabled') == '1' ) selected @endif>Yes</option>
                    <option value="0" @if( getOption('payment_notification_enabled') == '0' ) selected @endif>No</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Payment template</label>
                <small>Variables: {name}, {paid}, {due}</small>
                <textarea class="form-control" name="payment_template">{{ getOption('payment_template', 'Dear {name}, Your paid amount {paid} received. Your current due {due}') }}</textarea>
            </div>
            <div class="form-group">
                <label for="">Activation notification</label>
                <select name="activation_notification_enabled" class="form-control" id="bill_type">
                    <option value="1" @if( getOption('activation_notification_enabled') == '1' ) selected @endif>Yes</option>
                    <option value="0" @if( getOption('activation_notification_enabled') == '0' ) selected @endif>No</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Activation template</label>
                <small>Variables: {name}, {customerID}, {package}, {due}</small>
                <textarea class="form-control" name="activation_template">{{ getOption('activation_template', 'Dear {name}, Your internet connection has been activated. Your current due {due}, please pay your bill to avoid due bill profile.') }}</textarea>
            </div>
            <div class="form-group">
                <label for="">Disable notification</label>
                <select name="disable_notification_enabled" class="form-control" id="bill_type">
                    <option value="1" @if( getOption('disable_notification_enabled') == '1' ) selected @endif>Yes</option>
                    <option value="0" @if( getOption('disable_notification_enabled') == '0' ) selected @endif>No</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Disable template</label>
                <small>Variables: {name}, {package}, {due}</small>
                <textarea class="form-control" name="disable_template">{{ getOption('disable_template', 'Dear {name}, Your internet connection has been deactivated for the due bill profile. Your current due {due}, please pay your bill to re-activate your connection.') }}</textarea>
            </div>
            <div class="form-group">
                <label for="">Package change notification</label>
                <select name="package_change_notification_enabled" class="form-control" id="bill_type">
                    <option value="1" @if( getOption('package_change_notification_enabled') == '1' ) selected @endif>Yes</option>
                    <option value="0" @if( getOption('package_change_notification_enabled') == '0' ) selected @endif>No</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Package change template</label>
                <small>Variables: {name}, {package}, {due}</small>
                <textarea class="form-control" name="package_change_template">{{ getOption('package_change_template', 'Dear {name}, Your internet package has been changed. Your new package is {package}, and your due amount is {due}, please pay your bill to avoid further disconnection.') }}</textarea>
            </div>
            <div class="form-group">
                <label for="">Due bill notification</label>
                <select name="due_bill_notification_enabled" class="form-control" id="bill_type">
                    <option value="1" @if( getOption('due_bill_notification_enabled') == '1' ) selected @endif>Yes</option>
                    <option value="0" @if( getOption('due_bill_notification_enabled') == '0' ) selected @endif>No</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Due bill template</label>
                <small>Variables: {name}, {package}, {due}</small>
                <textarea class="form-control" name="due_bill_template">{{ getOption('due_bill_template', 'Dear {name}, Your  due amount is {due}, please pay your bill to avoid further disconnection.') }}</textarea>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="form-group">
        <input type="hidden" name="tab" value="sms">
        <input type="submit" value="Save Changes" name="submit" class="btn btn-primary save-general-settings">
    </div>
</form>
