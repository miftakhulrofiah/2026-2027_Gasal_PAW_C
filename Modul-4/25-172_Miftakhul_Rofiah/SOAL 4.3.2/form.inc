<fieldset>
    <legend>Person Details</legend>
    
    <div class="field">
        <label for="surname">Surname</label>
        <input type="text" name="surname" size="31" id="surname" value="<?php if(isset($_POST['surname'])) echo htmlspecialchars($_POST['surname']); ?>"/>
    </div>
    
    <div class="field">
        <label for="email">Email address</label>
        <input type="text" name="email" size="31" id="email" value="<?php if(isset($_POST['email'])) echo htmlspecialchars($_POST['email']); ?>"/>
    </div>
    
    <div class="field">
        <label for="password">Password</label>
        <input type="password" name="password" size="31" id="password" value="<?php if(isset($_POST['password'])) echo htmlspecialchars($_POST['password']); ?>"/>
    </div>
    
    <div class="field">
        <label for="address">Street Address</label>
        <textarea name="address" cols="25" rows="2" id="address"><?php if(isset($_POST['address'])) echo htmlspecialchars($_POST['address']); ?></textarea>
    </div>
    
    <div class="field">
        <label for="state">State</label>
        <select name="state" id="state">
            <option value="-1" selected>[choose your state]</option>
            <option value="1" <?php if(isset($_POST['state']) && $_POST['state'] == '1') echo 'selected'; ?>>Australian Capital Territory</option>
            <option value="2" <?php if(isset($_POST['state']) && $_POST['state'] == '2') echo 'selected'; ?>>Queensland</option>
            <option value="3" <?php if(isset($_POST['state']) && $_POST['state'] == '3') echo 'selected'; ?>>Victoria</option>
            <option value="4" <?php if(isset($_POST['state']) && $_POST['state'] == '4') echo 'selected'; ?>>New South Wales</option>
            <option value="5" <?php if(isset($_POST['state']) && $_POST['state'] == '5') echo 'selected'; ?>>Tasmania</option>
            <option value="6" <?php if(isset($_POST['state']) && $_POST['state'] == '6') echo 'selected'; ?>>South Australia</option>
            <option value="7" <?php if(isset($_POST['state']) && $_POST['state'] == '7') echo 'selected'; ?>>Western Australia</option>
            <option value="8" <?php if(isset($_POST['state']) && $_POST['state'] == '8') echo 'selected'; ?>>Northern Territory</option>
        </select>
    </div>
    
    <div class="field">
        <input type="hidden" name="country" value="Australia"/>
    </div>
    
    <div class="field">
        <label for="gender">Gender</label>
        <input type="radio" name="gender" value="Male" id="gender_male" <?php if(isset($_POST['gender']) && $_POST['gender'] == 'Male') echo 'checked'; ?>/>Male
        <input type="radio" name="gender" value="Female" id="gender_female" <?php if(isset($_POST['gender']) && $_POST['gender'] == 'Female') echo 'checked'; ?>/>Female
    </div>
    
    <div class="field">
        <label for="vegetarian">Vegetarian?</label>
        <input type="checkbox" name="vegetarian" id="vegetarian" <?php if(isset($_POST['vegetarian'])) echo 'checked'; ?> />
    </div>
    
    <div class="field">
        <label>&nbsp;</label>
        <input type="submit" value="Submit" name="submit"/>
        <input type="reset" value="Reset" name="reset"/>
    </div>
    
</fieldset>
