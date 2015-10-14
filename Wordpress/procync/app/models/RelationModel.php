<?php

class RelationModel {

	public static function evaluations($relation_id) {

        $evals = pods('evaluation', [
            'limit'     => -1,
            'where'     => 'relation.ID = ' . $relation_id
        ]);

		$ret = [];
		if($evals->total())
		{
			$all_evals = $evals->data();
			foreach ($all_evals as $key => $eval)
			{
				$ret[] = $eval;
			}
		}

		return $ret;
	}
}