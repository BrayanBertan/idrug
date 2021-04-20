insert into farmacia VALUES('Farmacia','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.','Rua Marcos Savaris 30 Monte Verde Morro da Fumaça Santa Catarina','34349999','48988046155','farmacia@gmail.com','assets/imagens/geral/logo.png','99999999999999');

INSERT INTO `modos_pagamento`(`id`, `tipo`, `status`,`foto`) VALUES (null,'Cartão Visa',true,'assets/imagens/geral/visa.png');

INSERT INTO `modos_pagamento`(`id`, `tipo`, `status`,`foto`) VALUES (null,'Cartão Mastercard',true,'assets/imagens/geral/mastercard.png');

INSERT INTO `modos_pagamento`(`id`, `tipo`, `status`,`foto`) VALUES (null,'Cartão Boleto',true,'assets/imagens/geral/barcode.png');
INSERT INTO `modos_pagamento`(`id`, `tipo`, `status`,`foto`) VALUES (null,'Cartão Dinheiro',true,'assets/imagens/geral/money.png');

INSERT INTO `modos_pagamento`(`id`, `tipo`, `status`,`foto`) VALUES (null,'Cartão Paypal',true,'assets/imagens/geral/paypal.png');

INSERT INTO `modos_pagamento`(`id`, `tipo`, `status`,`foto`) VALUES (null,'Pix',true,'assets/imagens/geral/pix.png');

INSERT INTO `unidade`(`id`, `nome`) VALUES (null,'Comprimido' );

INSERT INTO `unidade`(`id`, `nome`) VALUES (null,'Mg' );

INSERT INTO `unidade`(`id`, `nome`) VALUES (null,'G');
INSERT INTO `unidade`(`id`, `nome`) VALUES (null,'Ml' );

INSERT INTO `unidade`(`id`, `nome`) VALUES (null,'Gotas');


INSERT INTO categoria  VALUES(null, 'Relaxante Muscular');
INSERT INTO categoria  VALUES(null, 'Anticoagulante');
INSERT INTO categoria  VALUES(null, 'anti-hipertensivo');
INSERT INTO categoria  VALUES (null, 'Analgésico');
INSERT INTO categoria  VALUES (null, 'Antidiabético');
INSERT INTO categoria  VALUES (null, 'Suplemento de vitamina');
INSERT INTO categoria  VALUES (null, 'Anti-inflamatório');
INSERT INTO categoria  VALUES (null, 'Ansiolitíco');
INSERT INTO categoria  VALUES (null, 'Produto de Higiene');
INSERT INTO categoria  VALUES (null, 'Perfumes');
INSERT INTO categoria  VALUES (null, 'Outros');


INSERT INTO categoria  VALUES(null, 'Relaxante Muscular');
INSERT INTO categoria  VALUES(null, 'Anticoagulante');
INSERT INTO categoria  VALUES(null, 'anti-hipertensivo');
INSERT INTO categoria  VALUES (null, 'Analgésico');
INSERT INTO categoria  VALUES (null, 'Antidiabético');
INSERT INTO categoria  VALUES (null, 'Suplemento de vitamina');
INSERT INTO categoria  VALUES (null, 'Anti-inflamatório');
INSERT INTO categoria  VALUES (null, 'Ansiolitíco');
INSERT INTO categoria  VALUES (null, 'Produto de Higiene');
INSERT INTO categoria  VALUES (null, 'Perfumes');
INSERT INTO categoria  VALUES (null, 'Outros');


INSERT INTO acesso  VALUES(null, 'Pendente');
INSERT INTO acesso  VALUES(null, 'Acesso aos dados da farmacia');
INSERT INTO acesso  VALUES(null, 'Acesso aos produtos');
INSERT INTO acesso  VALUES (null, 'Acesso aos pedidos');
INSERT INTO acesso  VALUES (null, 'Admin');
