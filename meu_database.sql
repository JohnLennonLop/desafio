
--
-- Banco de dados: `projeto`
--
--
-- Estrutura para tabela anuidade e usuarios
--

CREATE TABLE `anuidade` (
  `ano` int(11) NOT NULL,
  `valor` float NOT NULL,
  `cod_anuidade` int(11) NOT NULL
) 


ALTER TABLE `anuidade`
  ADD PRIMARY KEY (`cod_anuidade`);

ALTER TABLE `anuidade`
  MODIFY `cod_anuidade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;


CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `dt_filiacao` date NOT NULL,
  `cpf` int(70) NOT NULL,
  `pg_feito` tinyint(1) DEFAULT 0
)

ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);


--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;
