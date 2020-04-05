import Vue from 'vue'

import { abilitiesPlugin, Can } from '@casl/vue'
import { AbilityBuilder } from '@casl/ability'

import ability from './ability'

// Vue.use(abilitiesPlugin, ability)

Vue.component('Can', Can)


let abilities = AbilityBuilder.define(can => {
	can('read', 'all')
})

Vue.use(abilitiesPlugin, abilities)