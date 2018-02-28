<?php namespace ProtectedContent; ?>

<form class="protected-content">
    <div class="inner">
        <img class="lock" src="<?= plugins_url('icons/locked.svg', __FILE__) ?>">
        <input type="text" placeholder="Access Code">
        <button>Unlock</button>

        <p>Vraag de toegangscode aan je docent.</p>
    </div>
</form>