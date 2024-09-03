<?php
require 'vendor/autoload.php';
require "./includes/database_connection.php";

//DATATABLE CSS
include './datatables_css.html';

$sql = "SELECT * FROM contents LIMIT 100";

$current_data = [];

$result = $con->query($sql);
?>
<div class="table-container">
	<table id="contents" class="table table-responsive">
		<thead>
			<th>Category</th>
			<th>Message</th>
			<th>Network</th>
			<th>Scheduled Date</th>
			<th>Scheduled Time</th>
			<th>Created At</th>
			<th>Updated At</th>
		</thead>
		<tbody>
			<?php
			while ($row = mysqli_fetch_assoc($result)) {
				array_push($current_data, $row);
			?>
				<tr>
					<td><?php echo $row["category"]; ?></td>
					<td><?php echo $row["message"]; ?></td>
					<td><?php echo $row["network"]; ?></td>
					<td><?php echo $row["schedule_date"] ?? "N/A"; ?></td>
					<td><?php echo $row["schedule_time"] ?? "N/A"; ?></td>
					<td><?php echo date('d-m-Y H:i:s', strtotime(date($row["created_at"]))); ?></td>
					<td><?php echo date('d-m-Y H:i:s', strtotime(date($row["updated_at"])));; ?></td>
				</tr>
			<?php
			}
			?>
		</tbody>
	</table>
</div>
<?php
// return $current_data[0];

$con->close();

?>

<?php
//DATATABLE SCRIPTS
include './datatable_js.html';
?>

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> -->
<script>
	$(document).ready(function() {
		$('#contents').DataTable({
			dom: 'Bfrtip',
			buttons: [
                    // {
                    //     extend: 'copy',
                    //     exportOptions: {
                    //         columns: [0, 1, 2] // Copy only the first three columns
                    //     }
                    // },
                    {
                        extend: 'excel',
						text: 'Excel',
						name: 'Pushed Contents',
                        exportOptions: {
                            columns: [0, 1, 2] // Adjust column indices for the Excel button
                        }
                    },
                    {
                        extend: 'pdf',
                        exportOptions: {
                            columns: [0, 1, 2] // Adjust column indices for the PDF button
                        }
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: [0, 1, 2] // Adjust column indices for the Print button
                        }
                    }
                ]
		});
	});
</script>