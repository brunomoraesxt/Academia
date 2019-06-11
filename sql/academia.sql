-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2019 at 03:08 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `academia`
--

-- --------------------------------------------------------

--
-- Table structure for table `aluno`
--

CREATE TABLE `aluno` (
  `Matricula` int(15) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `sexo` char(15) DEFAULT NULL,
  `data_nasc` date DEFAULT NULL,
  `CPF` int(11) DEFAULT NULL,
  `RG` varchar(9) DEFAULT NULL,
  `UF_Identidade` char(2) DEFAULT NULL,
  `Estado_civil` varchar(20) NOT NULL,
  `Objetivo` varchar(255) NOT NULL,
  `Profissao` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aluno`
--

INSERT INTO `aluno` (`Matricula`, `nome`, `email`, `sexo`, `data_nasc`, `CPF`, `RG`, `UF_Identidade`, `Estado_civil`, `Objetivo`, `Profissao`) VALUES
(31, 'Clarice Dias', 'clarice@outlook.com', 'Feminino', '1999-10-01', 12321312, '2131231', 'SP', 'Solteiro', 'Monstro', 'Nada'),
(32, 'Glaucio', 'semmundial@51.com', 'Masculino', '1999-01-01', 912831298, '839218921', 'SP', 'Solteiro', 'Ficar monstro', 'TI');

-- --------------------------------------------------------

--
-- Table structure for table `alunos_turma`
--

CREATE TABLE `alunos_turma` (
  `Codigo_Turma` int(9) NOT NULL DEFAULT '0',
  `Matricula_Aluno` int(15) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alunos_turma`
--

INSERT INTO `alunos_turma` (`Codigo_Turma`, `Matricula_Aluno`) VALUES
(7, 32);

-- --------------------------------------------------------

--
-- Table structure for table `avaliacao_fisica`
--

CREATE TABLE `avaliacao_fisica` (
  `Codigo_Avaliacao` int(9) NOT NULL,
  `Periodicidade_Validade` int(1) DEFAULT NULL,
  `Data_Realizacao` date DEFAULT NULL,
  `Matricula_Aluno` int(15) DEFAULT NULL,
  `Observacao` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `avaliacao_fisica`
--

INSERT INTO `avaliacao_fisica` (`Codigo_Avaliacao`, `Periodicidade_Validade`, `Data_Realizacao`, `Matricula_Aluno`, `Observacao`) VALUES
(1, 1, '2019-05-11', 32, 'Apto!');

-- --------------------------------------------------------

--
-- Table structure for table `endereco`
--

CREATE TABLE `endereco` (
  `Cod_endereco` int(9) NOT NULL,
  `endereco` varchar(255) DEFAULT NULL,
  `bairro` varchar(50) DEFAULT NULL,
  `CEP` varchar(10) DEFAULT NULL,
  `Cidade` varchar(20) DEFAULT NULL,
  `UF` char(2) DEFAULT NULL,
  `Matricula_Aluno` int(15) DEFAULT NULL,
  `Codigo_Funcionario` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `endereco`
--

INSERT INTO `endereco` (`Cod_endereco`, `endereco`, `bairro`, `CEP`, `Cidade`, `UF`, `Matricula_Aluno`, `Codigo_Funcionario`) VALUES
(21, 'Rua ok', 'taokei', '312312', 'Jarinu', 'SP', NULL, 1),
(22, 'Qualquer um', 'Miraflores', '829389', 'Itapevi', 'SP', NULL, 2),
(26, 'Rua Cica', 'Vila Rami', '12312313', 'JundiaÃ­', 'SP', 31, NULL),
(27, 'Rua sem Mundial', '51 Ã© Pinga', '515151051', 'JundiaÃ­', 'SP', 32, NULL),
(28, 'Rua 1', 'Bairro 2', '21321', 'Jundiai', 'SP', NULL, 4);

-- --------------------------------------------------------

--
-- Table structure for table `exame_medico`
--

CREATE TABLE `exame_medico` (
  `Codigo_Exame` int(9) NOT NULL,
  `Periodicidade_Validade` int(1) DEFAULT NULL,
  `Data_Realizacao` date DEFAULT NULL,
  `Matricula_Aluno` int(15) DEFAULT NULL,
  `Observacao` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exame_medico`
--

INSERT INTO `exame_medico` (`Codigo_Exame`, `Periodicidade_Validade`, `Data_Realizacao`, `Matricula_Aluno`, `Observacao`) VALUES
(1, 1, '2019-05-10', 32, 'Aluno apto!');

-- --------------------------------------------------------

--
-- Table structure for table `funcionario`
--

CREATE TABLE `funcionario` (
  `Codigo_Funcionario` int(15) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `sexo` char(15) DEFAULT NULL,
  `data_nasc` date DEFAULT NULL,
  `CPF` int(11) DEFAULT NULL,
  `RG` varchar(9) DEFAULT NULL,
  `UF_Identidade` char(2) DEFAULT NULL,
  `CREF` varchar(20) DEFAULT NULL,
  `Funcao` varchar(20) NOT NULL,
  `Data_Admissao` date NOT NULL,
  `Data_Desligamento` date NOT NULL,
  `Salario` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `funcionario`
--

INSERT INTO `funcionario` (`Codigo_Funcionario`, `nome`, `email`, `sexo`, `data_nasc`, `CPF`, `RG`, `UF_Identidade`, `CREF`, `Funcao`, `Data_Admissao`, `Data_Desligamento`, `Salario`) VALUES
(1, 'Lucas', 'lucas@gmail.com', 'Masculino', '1995-09-19', 999999993, '912312931', 'SP', '12312312', 'Professor', '2018-12-30', '0000-00-00', '1598.90'),
(2, 'Marcos', 'marcos@email.com', 'Masculino', '1990-11-04', 90908, '895849854', 'AC', '876547', 'Dono', '2017-11-01', '2018-10-30', '2000.50'),
(4, 'Breno Castro', 'bren@email.com', 'Masculino', '1980-04-01', 12321321, '321321312', 'MG', '1232131', 'Professor', '2019-04-01', '0000-00-00', '2000.00');

-- --------------------------------------------------------

--
-- Table structure for table `horario`
--

CREATE TABLE `horario` (
  `Codigo_Horario` int(9) NOT NULL,
  `Dia_Semana` char(15) DEFAULT NULL,
  `Hora_Inicio` time DEFAULT NULL,
  `Hora_Fim` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `horario`
--

INSERT INTO `horario` (`Codigo_Horario`, `Dia_Semana`, `Hora_Inicio`, `Hora_Fim`) VALUES
(3, 'Sexta-Feira', '19:00:00', '21:00:00'),
(4, 'Sabado', '13:00:00', '14:00:00'),
(6, 'Sexta-Feira', '19:00:00', '20:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `telefone`
--

CREATE TABLE `telefone` (
  `Codigo_Telefone` int(9) NOT NULL,
  `Telefone` varchar(15) DEFAULT NULL,
  `celular` varchar(15) DEFAULT NULL,
  `Matricula_Aluno` int(15) DEFAULT NULL,
  `Codigo_Funcionario` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `telefone`
--

INSERT INTO `telefone` (`Codigo_Telefone`, `Telefone`, `celular`, `Matricula_Aluno`, `Codigo_Funcionario`) VALUES
(5, '333333333333', '33333333333', NULL, 2),
(6, '4444444', '55555555', NULL, 1),
(7, '12321312', '312321', 31, NULL),
(8, '51515151', '5151515151', 32, NULL),
(9, '21321321', '321321321', NULL, 4);

-- --------------------------------------------------------

--
-- Table structure for table `treinos`
--

CREATE TABLE `treinos` (
  `codigo_treino` int(9) NOT NULL,
  `prescricao` int(9) DEFAULT NULL,
  `data_inicio` date DEFAULT NULL,
  `reavaliacao` date DEFAULT NULL,
  `sessoes` int(3) DEFAULT NULL,
  `codigo_funcionario` int(9) DEFAULT NULL,
  `matricula_aluno` int(9) DEFAULT NULL,
  `objetivo` char(30) DEFAULT NULL,
  `observacao` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `treinos`
--

INSERT INTO `treinos` (`codigo_treino`, `prescricao`, `data_inicio`, `reavaliacao`, `sessoes`, `codigo_funcionario`, `matricula_aluno`, `objetivo`, `observacao`) VALUES
(8, 2, '2019-06-01', '2019-06-30', 10, 1, 32, 'Condicionamento Fisico', '');

-- --------------------------------------------------------

--
-- Table structure for table `turma`
--

CREATE TABLE `turma` (
  `Codigo_Turma` int(9) NOT NULL,
  `Sexo` char(9) DEFAULT NULL,
  `Codigo_Funcionario` int(15) DEFAULT NULL,
  `Codigo_Horario` int(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `turma`
--

INSERT INTO `turma` (`Codigo_Turma`, `Sexo`, `Codigo_Funcionario`, `Codigo_Horario`) VALUES
(7, 'Ambos', 4, 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`Matricula`),
  ADD UNIQUE KEY `CPF` (`CPF`);

--
-- Indexes for table `alunos_turma`
--
ALTER TABLE `alunos_turma`
  ADD PRIMARY KEY (`Codigo_Turma`,`Matricula_Aluno`),
  ADD KEY `alunos_turma_ibfk_2` (`Matricula_Aluno`);

--
-- Indexes for table `avaliacao_fisica`
--
ALTER TABLE `avaliacao_fisica`
  ADD PRIMARY KEY (`Codigo_Avaliacao`),
  ADD KEY `Matricula_Aluno` (`Matricula_Aluno`);

--
-- Indexes for table `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`Cod_endereco`),
  ADD KEY `Matricula_Aluno` (`Matricula_Aluno`),
  ADD KEY `Codigo_Funcionario` (`Codigo_Funcionario`);

--
-- Indexes for table `exame_medico`
--
ALTER TABLE `exame_medico`
  ADD PRIMARY KEY (`Codigo_Exame`),
  ADD KEY `Matricula_Aluno` (`Matricula_Aluno`);

--
-- Indexes for table `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`Codigo_Funcionario`),
  ADD UNIQUE KEY `CPF` (`CPF`);

--
-- Indexes for table `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`Codigo_Horario`);

--
-- Indexes for table `telefone`
--
ALTER TABLE `telefone`
  ADD PRIMARY KEY (`Codigo_Telefone`),
  ADD KEY `Codigo_Funcionario` (`Codigo_Funcionario`),
  ADD KEY `telefone_ibfk_1` (`Matricula_Aluno`);

--
-- Indexes for table `treinos`
--
ALTER TABLE `treinos`
  ADD PRIMARY KEY (`codigo_treino`),
  ADD KEY `codigo_funcionario` (`codigo_funcionario`),
  ADD KEY `matricula_aluno` (`matricula_aluno`);

--
-- Indexes for table `turma`
--
ALTER TABLE `turma`
  ADD PRIMARY KEY (`Codigo_Turma`),
  ADD KEY `Codigo_Funcionario` (`Codigo_Funcionario`),
  ADD KEY `Codigo_Horario` (`Codigo_Horario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aluno`
--
ALTER TABLE `aluno`
  MODIFY `Matricula` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `avaliacao_fisica`
--
ALTER TABLE `avaliacao_fisica`
  MODIFY `Codigo_Avaliacao` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `endereco`
--
ALTER TABLE `endereco`
  MODIFY `Cod_endereco` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `exame_medico`
--
ALTER TABLE `exame_medico`
  MODIFY `Codigo_Exame` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `Codigo_Funcionario` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `horario`
--
ALTER TABLE `horario`
  MODIFY `Codigo_Horario` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `telefone`
--
ALTER TABLE `telefone`
  MODIFY `Codigo_Telefone` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `treinos`
--
ALTER TABLE `treinos`
  MODIFY `codigo_treino` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `turma`
--
ALTER TABLE `turma`
  MODIFY `Codigo_Turma` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alunos_turma`
--
ALTER TABLE `alunos_turma`
  ADD CONSTRAINT `alunos_turma_ibfk_1` FOREIGN KEY (`Codigo_Turma`) REFERENCES `turma` (`Codigo_Turma`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `alunos_turma_ibfk_2` FOREIGN KEY (`Matricula_Aluno`) REFERENCES `aluno` (`Matricula`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `avaliacao_fisica`
--
ALTER TABLE `avaliacao_fisica`
  ADD CONSTRAINT `avaliacao_fisica_ibfk_1` FOREIGN KEY (`Matricula_Aluno`) REFERENCES `aluno` (`Matricula`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `endereco`
--
ALTER TABLE `endereco`
  ADD CONSTRAINT `endereco_ibfk_1` FOREIGN KEY (`Matricula_Aluno`) REFERENCES `aluno` (`Matricula`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `endereco_ibfk_2` FOREIGN KEY (`Codigo_Funcionario`) REFERENCES `funcionario` (`Codigo_Funcionario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `exame_medico`
--
ALTER TABLE `exame_medico`
  ADD CONSTRAINT `exame_medico_ibfk_1` FOREIGN KEY (`Matricula_Aluno`) REFERENCES `aluno` (`Matricula`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `telefone`
--
ALTER TABLE `telefone`
  ADD CONSTRAINT `telefone_ibfk_1` FOREIGN KEY (`Matricula_Aluno`) REFERENCES `aluno` (`Matricula`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `telefone_ibfk_2` FOREIGN KEY (`Codigo_Funcionario`) REFERENCES `funcionario` (`Codigo_Funcionario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `treinos`
--
ALTER TABLE `treinos`
  ADD CONSTRAINT `treinos_ibfk_1` FOREIGN KEY (`codigo_funcionario`) REFERENCES `funcionario` (`Codigo_Funcionario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `treinos_ibfk_2` FOREIGN KEY (`matricula_aluno`) REFERENCES `aluno` (`Matricula`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `turma`
--
ALTER TABLE `turma`
  ADD CONSTRAINT `turma_ibfk_1` FOREIGN KEY (`Codigo_Funcionario`) REFERENCES `funcionario` (`Codigo_Funcionario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `turma_ibfk_2` FOREIGN KEY (`Codigo_Horario`) REFERENCES `horario` (`Codigo_Horario`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
