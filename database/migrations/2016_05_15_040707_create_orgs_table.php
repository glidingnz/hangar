<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Eloquent\Model;
use App\Models\Org;

class CreateOrgsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('orgs', function (Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->string('website');
			$table->string('slug');
			$table->string('gnz_code');
			$table->string('type')->default('contest');
			$table->timestamps();
		});

		
		$org = new Org;
		$org->name='Glide Omarama / Southern Soaring';
		$org->slug='glideomarama';
		$org->type='club';
		$org->website='www.glideomarama.com';
		$org->save();

		$org = new Org;
		$org->name='Whenuapai Aviation Sports Club';
		$org->slug='whenuapai';
		$org->type='club';
		$org->website='www.ascgliding.org';
		$org->save();

		$org = new Org;
		$org->name='Auckland Gliding Club';
		$org->slug='auckland';
		$org->type='club';
		$org->website='www.glidingauckland.co.nz';
		$org->save();

		$org = new Org;
		$org->name='Canterbury Gliding Club';
		$org->slug='canterbury';
		$org->type='club';
		$org->website='www.glidingcanterbury.org.nz';
		$org->save();

		$org = new Org;
		$org->name='Central Otago Flying Club';
		$org->slug='otago';
		$org->type='club';
		$org->website='www.cofc.co.nz';
		$org->save();

		$org = new Org;
		$org->name='Gliding Hutt Valley';
		$org->slug='huttvalley';
		$org->type='club';
		$org->website='www.glidinghuttvalley.co.nz';
		$org->save();

		$org = new Org;
		$org->name='Gliding Manawatu';
		$org->slug='manawatu';
		$org->type='club';
		$org->website='www.glidingmanawatu.org.nz';
		$org->save();

		$org = new Org;
		$org->name='Gliding Hawkes Bay & Waipukurau Inc';
		$org->slug='hawkesbay';
		$org->type='club';
		$org->website='www.glidinghbw.co.nz';
		$org->save();

		$org = new Org;
		$org->name='Kaikohe Gliding Club';
		$org->slug='kaikohe';
		$org->type='club';
		$org->website='www.glidingkaikohe.co.nz';
		$org->save();

		$org = new Org;
		$org->name='Marlborough Gliding Club';
		$org->slug='marlborough';
		$org->type='club';
		$org->website='';
		$org->save();

		$org = new Org;
		$org->name='Nelson Lakes Gliding Club';
		$org->slug='nelsonlakes';
		$org->type='club';
		$org->website='www.glidingnelson.co.nz';
		$org->save();

		$org = new Org;
		$org->name='Norfolk Aviation Sports Club';
		$org->slug='norfolk';
		$org->type='club';
		$org->website='';
		$org->save();

		$org = new Org;
		$org->name='Omarama Gliding Club';
		$org->slug='omarama';
		$org->type='club';
		$org->website='www.omarama.com';
		$org->save();

		$org = new Org;
		$org->name='Piako Gliding Club';
		$org->slug='piako';
		$org->type='club';
		$org->website='www.glidingmatamata.co.nz';
		$org->save();

		$org = new Org;
		$org->name='Rotorua Gliding Club';
		$org->slug='rotorua';
		$org->type='club';
		$org->website='www.rotoruaglidingclub.blogspot.com';
		$org->save();

		$org = new Org;
		$org->name='South Canterbury Gliding Club';
		$org->slug='sthcanterbury';
		$org->type='club';
		$org->website='www.glidingsouthcanterbury.co.nz';
		$org->save();

		$org = new Org;
		$org->name='Taranaki Gliding Club';
		$org->slug='taranaki';
		$org->type='club';
		$org->website='www.glidingtaranaki.com';
		$org->save();

		$org = new Org;
		$org->name='Taupo Gliding Club';
		$org->slug='taupo';
		$org->type='club';
		$org->website='www.taupoglidingclub.co.nz';
		$org->save();

		$org = new Org;
		$org->name='Tauranga Gliding Club';
		$org->slug='tauranga';
		$org->type='club';
		$org->website='www.glidingtauranga.co.nz';
		$org->save();

		$org = new Org;
		$org->name='Wellington Gliding Club';
		$org->slug='wellington';
		$org->type='club';
		$org->website='www.soar.co.nz';
		$org->save();

		$org = new Org;
		$org->name='Whangarei Gliding Club';
		$org->slug='whangarei';
		$org->type='club';
		$org->website='';
		$org->save();

		$org = new Org;
		$org->name='Gliding Wairarapa';
		$org->slug='wairarapa';
		$org->type='club';
		$org->website='';
		$org->save();
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('orgs');
	}
}
