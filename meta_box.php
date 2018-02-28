<?php namespace ProtectedContent; ?>

<p>
    <input type="checkbox" name="pc_enabled" id="enabled" <?= $assigns['enabled'] ? 'checked' : '' ?>>
    <strong>Enable</strong>
</p>

<p>
    <strong>Access Code</strong><br/>
    <input type="text" id="pc_code" name="pc_code" value="<?= $assigns['code'] ?>" maxlength="5" minlength="5">
</p>