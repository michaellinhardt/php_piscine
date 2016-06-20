INSERT INTO `ft_table` (`login`, `date_de_creation`, `groupe`)
SELECT `nom`, `date_naissance`, "other" FROM fiche_personne WHERE CHAR_LENGTH(`nom`) < 9 AND INSTR(nom, 'a') > 0
ORDER BY `nom` limit 10;
