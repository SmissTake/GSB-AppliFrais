<?= $this->extend('l_comptable') ?>

<?= $this->section('body') ?>
<div id="contenu">
	<h2>Liste de mes fiches de frais</h2>
	 	
	<?php if(!empty($notify)) echo '<p id="notify" >'.$notify.'</p>';?>
	 
	<table class="listeLegere">
		<thead>
			<tr>
                <th >Mois</th>
                <th >Nom/prénom</th>
				<th >Etat</th>  
				<th >Montant</th>  
				<th >Date modif.</th>  
				<th  colspan="4">Actions</th>              
			</tr>
		</thead>
		<tbody>
          
		<?php    
			foreach($lesFiches as $uneFiche) 
			{
				$link = '';
				$reLink = '';
				$mpLink = '';

				if ($uneFiche['id'] == 'CL') {
					$link = anchor('comptable/validerFiche/'.$uneFiche['idVisiteur'].'/'.$uneFiche['mois'], 'Valider',  'title="Valider la fiche" onclick="return confirm(\'Voulez-vous vraiment valider cette fiche ?\');"');
					$reLink = anchor('','Refuser',  'title="Refuser la fiche"  onclick=""');
					//$reLink = "<a onclick=\"confirmPrompt('.$uneFiche['idVisiteur'].','.$uneFiche['mois'].')\">";
				}elseif($uneFiche['id'] == 'VA'){
					$link = anchor('comptable/miseEnPaiementFiche/'.$uneFiche['idVisiteur'].'/'.$uneFiche['mois'], 'Mettre en paiement',  'title="Mettre en paiement la fiche" onclick="return confirm(\'Voulez-vous vraiment mettre en paiement cette fiche ?\');"');
				}

				echo 
				'<tr>
                    <td class="date">'.anchor('visiteur/voirMaFiche/'.$uneFiche['mois'], $uneFiche['mois'],  'title="Consulter la fiche"').'</td>
                    <td class="nom">'.$uneFiche['nom'].' '.$uneFiche['prenom'].'</td>
					<td class="libelle">'.$uneFiche['libelle'].'</td>
					<td class="montant">'.$uneFiche['montantValide'].'</td>
					<td class="date">'.$uneFiche['dateModif'].'</td>
					<td class="action">'.$link.'</td>
					<td class="action">'.$reLink.'</td>
					</tr>';
			}
		?>	  
		</tbody>
		<script type="text/javascript">
			// function confirmPrompt(idVisiteur, mois){
			// 	var message = prompt('Motif du refus ?',);

			// 	if(message != null){
			// 		if(confirm('Confirmer le refus ? Motif : ' + message)){
			// 			window.location.href = 'comptable/refuserFiche/' + idVisiteur + '/' + mois;
			// 		}
					
			// 	}
			// 	else{
			// 		alert('Aucun message saisi');
			// 	}
			// }
		</script>
    </table>

</div>
<?= $this->endSection() ?>