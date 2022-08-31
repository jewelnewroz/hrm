<form action='/dashboard/option/store' method="POST">
    @csrf
    <div class="form-group">
        <label for="mikrotik_access">Enable Mikrotik Access?</label>
        <select name="mikrotik_access" class="form-control" id="mikrotik_access">
            <option value="0" >No</option>
            <option value="1" @if( getOption('mikrotik_access') == 1 ) selected @endif>Yes</option>
        </select>
    </div>
    <div class="form-group">
        <label for="mikrotik_default_password">Default Password</label>
        <input name="mikrotik_default_password" type="text" class="form-control" id="mikrotik_default_password" value="{{ getOption('mikrotik_default_password', '123456789') }}">
    </div>
<div class="form-group">
    <div class="row">
        <div class="col-sm-6 padding-right">
            <label for="remote_ip">IP Address Required?</label>
            <select name="remote_ip" class="form-control" id="remote_ip">
                <option value="0">No</option>
                <option value="1" @if( getOption('remote_ip') == 1 ) selected @endif>Yes</option>
            </select>
        </div>
        <div class="col-sm-6 padding-right">
            <label for="remote_mac">Mac Address Required?</label>
            <select name="remote_mac" class="form-control" id="remote_mac">
                <option value="0">No</option>
                <option value="1"  @if( getOption('remote_mac') == 1 ) selected @endif>Yes</option>
            </select>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<div class="form-group">
    <input type="hidden" name="tab" value="mikrotik">
    <input type="submit" value="Save Changes" name="submit" class="btn btn-primary save-general-settings">
</div>
</form>
