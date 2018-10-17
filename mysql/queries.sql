INSERT INTO usuarios(`primeiro_nome`, `ultimo_nome`, `cep`, `login`, `senha`, `avatar`, `email`, `data`, `status_id`, `rating`) VALUE('Shinnok', 'Rafael','06429-000', 'rshinnok', 'senha', 'avatar', 'r.shinnok@gmail.com', '2018-10-12', 1, 5);

SELECT * FROM usuarios;

INSERT INTO status(`status`) VALUE('INATIVO');
INSERT INTO status(`status`) VALUE('ATIVO');

SELECT * FROM status;

SELECT * FROM usuarios WHERE usuario_id = 5;
