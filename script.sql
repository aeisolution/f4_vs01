-- VIEW vTickets
select tickets.ID AS ID,
	tickets.ClienteId AS ClienteId,
	tickets.Data AS Data,
	tickets.Oggetto AS Oggetto,
	tickets.Descrizione AS Descrizione,
	tickets.DataClose AS DataClose,
	tickets.CategoriaId AS CategoriaId,
	tickets.StatoId AS StatoId,
	tickets.RepartoId AS RepartoId,
	reparti.Nome AS Reparto,
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
		
	) left join reparti on tickets.RepartoId = reparti.ID




	-- VIEW vTickets_work
	SELECT tickets_work.*, reparti.Nome AS Reparto, stati.Nome AS Stato,
			CONCAT(operatori.Cognome, ' ', operatori.Nome) AS Operatore 
	FROM tickets_work
		LEFT JOIN operatori ON tickets_work.OperatoreId = operatori.ID
		LEFT JOIN reparti ON tickets_work.RepartoId = reparti.ID
		LEFT JOIN stati ON tickets_work.StatoId = stati.ID