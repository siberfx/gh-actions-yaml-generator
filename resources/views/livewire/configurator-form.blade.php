<div>

  <!--div class="md:grid md:grid-cols-2 md:gap-6"-->
  <div class="">
      <!--div class="md:col-span-1">
          <div class="px-4 sm:px-0">
              <h3 class="text-lg font-medium leading-6 text-gray-900">Workflow</h3>
              <p class="mt-1 text-sm text-gray-600">
                  Configure your Github Actions workflow for your Laravel / PHP Application.
              </p>
          </div>
      </div-->
    <div class="mt-5 md:mt-0 md:col-span-2">
      <form wire:submit.prevent="submitForm"  action="#" method="POST">
        @csrf
        <div class="shadow sm:rounded-md sm:overflow-hidden">
          <div class="px-4 py-5 bg-white space-y-6 sm:p-6 ">
            <x-form.input-text
                model="name"
                name="name"
                label="Name"
                value="Laravel Action Workflow"
                help="The name of your workflow. GitHub displays the names of your workflows on your repository's actions page.">
            </x-form.input-text>


            <fieldset  class="border-2 shadow-2xl p-4 rounded-2xl">
                <legend class="text-xl font-medium text-gray-900 px-2 pb-2">On - GitHub event that triggers the workflow.</legend>
                <div class="md:grid md:grid-cols-3 md:gap-3">
                  <div class="col-span-1 ">
                    <div class="mt-4 space-y-4">
                      <x-form.input-checkbox
                        model="manualTrigger"
                        name="manualTrigger"
                        label="Manual Trigger"
                        value="1"
                        help=""
                      >
                      </x-form.input-checkbox>
                    </div>
                  </div>
                  <div class="col-span-1 ">
                    <x-form.input-conditional-checkbox
                        model="onPush"
                        name="onPush"
                        label="On Push"
                        id="onPush"
                        value=1
                        wire:model="onPush"
                    >
                        <x-form.input-text
                            model="onPushBranches"
                            name="onPushBranches"
                            label="Branches"
                            help="Branches for the push, comma separated for example main,develop.">
                        </x-form.input-text>
                    </x-form.input-conditional-checkbox>
                  </div>
                  <div class="col-span-1 ">
                    <x-form.input-conditional-checkbox
                      model="onPullrequest"
                      name="onPullrequest"
                      label="On Pull Request"
                      id="onPullrequest"
                      value=1
                      wire:model="onPullrequest"
                    >
                      <x-form.input-text
                        model="onPullRequestBranches"
                        name="onPullRequestBranches"
                        label="Branches"
                        help="Branches for the PR, comma separated for example main,develop.">
                      </x-form.input-text>
                    </x-form.input-conditional-checkbox>

                  </div>
                </div>
            </fieldset>

            <fieldset class="border-2 shadow-2xl p-4 rounded-2xl">
              <legend class="text-xl font-medium text-gray-900 px-2 pb-2">Mysql Container Service</legend>
                <x-form.input-conditional-checkbox
                    model="mysqlService"
                    name="mysqlService"
                    label="Mysql Service"
                    id="mysqlService"
                    value=1
                    wire:model="mysqlService"
                >
                  <div class="md:grid md:grid-cols-3 md:gap-3">
                    <div class="col-span-1 ">
                      <x-form.input-text
                          model="mysqlVersion"
                          name="mysqlVersion"
                          label="Mysql Version"
                          help="Define the Mysql Version">
                      </x-form.input-text>
                    </div>
                    <div class="col-span-1 ">
                      <x-form.input-text
                          model="mysqlDatabaseName"
                          name="mysqlDatabaseName"
                          label="Mysql Database Name"
                          help="Define the Mysql database name">
                      </x-form.input-text>
                    </div>
                    <div class="col-span-1 ">
                      <x-form.input-text
                          model="mysqlDatabasePort"
                          name="mysqlDatabasePort"
                          label="Mysql Database Port"
                          help="The Port exposed by the container, this is the external port.">
                      </x-form.input-text>
                    </div>
                  </div>
                </x-form.input-conditional-checkbox>
            </fieldset>

            <fieldset class="border-2 shadow-2xl p-4 rounded-2xl">
              <legend class="text-xl font-medium text-gray-900 px-2 pb-2">Caching</legend>
              <div class="md:grid md:grid-cols-2 md:gap-2">
                <div class="col-span-1 ">
                  <div class="mt-4 space-y-4">
                    <x-form.input-checkbox
                      model="stepCachePackages"
                      name="stepCachePackages"
                      label="Cache PHP Packages"
                      value="1"
                      help="Enable this, to improve speed of installing packages"
                    >
                    </x-form.input-checkbox>
                  </div>
                </div>
                <div class="col-span-1 ">
                  <div class="mt-4 space-y-4">
                    <x-form.input-checkbox
                      model="stepCacheVendors"
                      name="stepCacheVendors"
                      label="Cache Vendor directory"
                      value="1"
                      help="Enable this, to skip installing packages using previous vendor cache"
                    >
                    </x-form.input-checkbox>
                  </div>
                </div>

              </div>
            </fieldset>

            <fieldset class="border-2 shadow-2xl p-4 rounded-2xl">
              <legend class="text-xl font-medium text-gray-900 px-2 pb-2">Environments (PHP / Node)</legend>
              <div class="md:grid md:grid-cols-2 md:gap-2">
                <div class="col-span-1 ">
                  <x-form.input-conditional-checkbox
                    model="stepNodejs"
                    name="stepNodejs"
                    label="Install node for NPM build"
                    id="stepNodejs"
                    value=1
                    wire:model="stepNodejs"
                  >
                    <x-form.input-text
                      model="stepNodejsVersion"
                      name="stepNodejsVersion"
                      label="Node Js Version"
                      help="Define the nodejs Version">
                    </x-form.input-text>
                  </x-form.input-conditional-checkbox>
                </div>


                <div class="col-span-1 ">
                  <x-form.input-select
                    model="stepPhpVersions"
                    name="stepPhpVersions"
                    label="PHP Versions"
                    :list="['8.0','7.4','7.3']"
                    help="Select PHP Versions (Multiple)">
                  </x-form.input-select>
                </div>
              </div>

            </fieldset>

            <fieldset class="border-2 shadow-2xl p-4 rounded-2xl">
              <legend class="text-xl font-medium text-gray-900 px-2 pb-2">Laravel stuff</legend>
              <div class="md:grid md:grid-cols-2 md:gap-2">
                <div class="col-span-1 ">

                    <x-form.input-text
                      model="stepEnvTemplateFile"
                      name="stepEnvTemplateFile"
                      label="Env template file"
                      help="Define env template file to use in actions">
                    </x-form.input-text>
                </div>
                <div class="col-span-1 ">

                  <x-form.input-checkbox
                    model="stepFixStoragePermissions"
                    name="stepFixStoragePermissions"
                    label="Fix storage permission"
                    help="Fix storage permission via chmod 777">
                  </x-form.input-checkbox>
                </div>

              </div>

            </fieldset>

          </div>


          <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              Generate Yaml File
            </button>
          </div>
        </div>
      </form>
    </div>

  </div>

  <div class="">
    <div class="px-4 mt-3 ">
      <pre class="font-mono bg-gray-100 shadow-2xl 2xl:box-border rounded-3xl">{{ $result }}</pre>
    </div>
  </div>
</div>