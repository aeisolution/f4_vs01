select tickets.ID AS ID,
	tickets.ClienteId AS ClienteId,
	tickets.Data AS Data,
	tickets.Oggetto AS Oggetto,
	tickets.Descrizione AS Descrizione,
	tickets.DataClose AS DataClose,
	tickets.CategoriaId AS CategoriaId,
	tickets.StatoId AS StatoId,
	categorie.Nome AS Categoria,
	stati.Nome AS Stato,
	CONCAT(clienti.Cognome, ' ', clienti.Nome) AS Cliente,
	tickets.OperatoreId AS OperatoreId,
	CONCAT(operatori.Cognome, ' ', operatori.Nome) AS Operatore
from 
	(
		(
			(
				(tickets left join categorie on((tickets.CategoriaId = categorie.ID))) 
				left join stati on((tickets.StatoId = stati.ID))
			) 
			left join clienti on((tickets.ClienteId = clienti.ID))
		)
		left join operatori on((tickets.OperatoreId = operatori.ID))
	)