CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `barcode` varchar(50) NOT NULL,
  `price` decimal(19,4) NOT NULL,
  `product` varchar(50) NOT NULL,
  `status` int(1) DEFAULT '1',
  PRIMARY KEY (`id`)
);

CREATE TABLE `trans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `total` decimal(19,4) DEFAULT '0.0000',
  PRIMARY KEY (`id`)
);

CREATE TABLE `trans_details` (
  `id` int(11) NOT NULL,
  `product` varchar(25) NOT NULL,
  `price` decimal(19,4) NOT NULL,
  `barcode` varchar(25) NOT NULL
);

insert into products (barcode, product, price) values ('133111', 'corn beef', 50);
insert into products (barcode, product, price) values ('9843121', 'egg', 50);