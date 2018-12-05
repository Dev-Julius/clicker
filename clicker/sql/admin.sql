/*create database clicker;*/
create role clicker_admin password 'admin' login;
grant all on database clicker to clicker_admin;