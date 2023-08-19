create database if not exists udemy_masterphp_project2;

create table user(
    id int auto_increment not null,
    name varchar(150) not null,
    surname varchar(150),
    email varchar(255) not null,
    password varchar(255) not null,
    role varchar(20) not null,
    thumbnail varchar(255),
    constraint pk_user primary key (id),
    constraint uq_email unique (email)
)engine=InnoDB;

insert into user(name, surname, email, password, role)
values ('Administrator','admin','admin@admin.com','admin','Admin');

create table category(
    id int auto_increment not null,
    name varchar(150) not null,
    constraint pk_category primary key (id),
    constraint uq_category unique(name)
)engine=InnoDb;

insert into category(name)
values('Tenis'),
('Pantalones'),
('Playeras'),
('Relojes');

create table product(
    id int auto_increment not null,
    category_id int not null,
    name varchar(155) not null,
    description text,
    price double(10,2) not null,
    stock int not null,
    discount varchar(2),
    `date` date,
    thumbnail varchar(255),
    constraint pk_product primary key (id),
    constraint fk_product_category foreign key (category_id) references category(id)
);


create table `order` (
    id int auto_increment not null,
    user_id int not null,
    province varchar(155),
    location varchar(155),
    address varchar(255),
    state varchar(155),
    total_price double(10,2) not null,
    `date` date,
    `time` time,
    constraint pk_order primary key (id),
    constraint fk_order_user foreign key (user_id) references user(id) on delete cascade
)engine=InnoDb;

create table ticket (
    id int auto_increment not null,
    order_id int not null,
    product_id int not null,
    unity int not null,
    constraint pk_ticket primary key (id),
    constraint fk_ticket_order foreign key (order_id) references `order` (id),
    constraint fk_ticket_product foreign key (product_id) references product (id)
)engine=InnoDb;

