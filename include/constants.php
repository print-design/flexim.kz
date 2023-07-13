<?php
const ISINVALID = ' is-invalid';

// Роли
const ROLE_ADMIN = 1;
const ROLE_MANAGER = 2;
const ROLE_MANAGER_SENIOR = 3;

const ROLES = array(ROLE_ADMIN, ROLE_MANAGER, ROLE_MANAGER_SENIOR);
const ROLE_NAMES = array(ROLE_ADMIN => "admin", ROLE_MANAGER => "manager", ROLE_MANAGER_SENIOR => "manager_senior");
const ROLE_LOCAL_NAMES = array(ROLE_ADMIN => "Администратор", ROLE_MANAGER => "Менеджер", ROLE_MANAGER_SENIOR => "Старший менеджер");
const ROLE_TWOFACTOR = array(ROLE_ADMIN => 0, ROLE_MANAGER => 0, ROLE_MANAGER_SENIOR => 0);
?>